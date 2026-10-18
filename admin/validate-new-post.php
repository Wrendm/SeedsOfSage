<?php
include('./partials/check-login.php');
/** @var mysqli $conn */

if (isset($_POST['submit'])) {
    $title   = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $date    = date("Y/m/d");

    $failure = "";
    if (strlen($title) < 1) {
        $failure .= "Post title is required\n";
    }
    if (strlen($content) < 1) {
        $failure .= "Post text is required\n";
    }

    if ($failure === "") {
        $content = strtr($content, ["\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />']);

        $stmt = $conn->prepare(
            "INSERT INTO tbl_posts (title, content, date) VALUES (?, ?, STR_TO_DATE(?, '%Y/%m/%d'))"
        );
        $stmt->bind_param("sss", $title, $content, $date);

        if ($stmt->execute()) {
            $_SESSION['add'] = "Blog Addition of " . htmlspecialchars($title) . " Successful";
        } else {
            $_SESSION['add'] = "Blog Addition of " . htmlspecialchars($title) . " Failed";
        }
        $stmt->close();
    } else {
        $_SESSION['failure'] = $failure;
    }
}

header('Location: ' . HOMEPAGE . 'admin/manage-posts.php');
exit;
?>