<?php
include('./partials/check-login.php');
/** @var mysqli $conn */

if (isset($_POST['submit'])) {
    $title       = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $time        = $_POST['time'] ?? '';
    $location    = $_POST['location'] ?? '';
    $active      = $_POST['active'] ?? 'No';

    $weeklyCount  = (int)($_POST['weeklyRepetition'] ?? 0);
    $weeklyEvery  = (int)($_POST['weeklyRepetitionFrequency'] ?? 1);
    $monthlyCount = (int)($_POST['monthlyRepetition'] ?? 0);

    $failure = "";
    if ($title === '')       { $failure .= "Item title is required\n"; }
    if ($description === '') { $failure .= "Item description is required\n"; }

    $timestamp = strtotime($_POST['date'] ?? '');
    if ($timestamp === false) { $failure .= "A valid date is required\n"; }

    if ($failure === "") {
        // 1. Build the list of dates
        $start = (new DateTime())->setTimestamp($timestamp)->setTime(0, 0);
        $dates = [];

        if ($weeklyCount > 0) {
            $stepDays = max(1, $weeklyEvery) * 7;
            for ($i = 0; $i < $weeklyCount; $i++) {
                $d = clone $start;
                $d->modify('+' . ($i * $stepDays) . ' days');
                $dates[] = $d->format('Y-m-d');
            }
        } elseif ($monthlyCount > 0) {
            $startDay = (int)$start->format('j');
            for ($i = 0; $i < $monthlyCount; $i++) {
                $d = clone $start;
                $d->modify("first day of +$i month");
                $day = min($startDay, (int)$d->format('t')); // clamp, so Jan 31 -> Feb 28
                $d->setDate((int)$d->format('Y'), (int)$d->format('n'), $day);
                $dates[] = $d->format('Y-m-d');
            }
        } else {
            $dates[] = $start->format('Y-m-d');
        }

        // 2. Insert them all with one prepared statement
        $description = strtr($description, ["\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />']);
        $stmt = $conn->prepare(
            "INSERT INTO tbl_events (title, description, date, time, location, active) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $eventDate = '';
        $stmt->bind_param("ssssss", $title, $description, $eventDate, $time, $location, $active);

        $added = 0;
        foreach ($dates as $eventDate) {   // bind_param is by reference, so $eventDate updates each pass
            try {
                $stmt->execute();
                $added++;
            } catch (mysqli_sql_exception $e) {
                // counted as a failure below
            }
        }
        $stmt->close();

        $total = count($dates);
        $safeTitle = htmlspecialchars($title);
        $_SESSION['add'] = ($added === $total)
            ? "Added $added event(s) for $safeTitle"
            : "Added $added of $total event(s) for $safeTitle; some failed";
    } else {
        $_SESSION['failure'] = $failure;
    }
}

header('Location: ' . HOMEPAGE . 'admin/manage-events.php');
exit;
?>