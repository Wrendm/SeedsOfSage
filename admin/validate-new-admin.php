<?php
include('./partials/check-login.php');
/** @var mysqli $conn */

if (isset($_POST['submit'])) {
    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';   // never trim passwords

    $failure = "";

    // at least two words; letters, hyphens and apostrophes only
    if (!preg_match("/^[\p{L}'-]+( [\p{L}'-]+)+$/u", $fullname)) {
        $failure .= "Name must be a full name (first and last)\n";
    }
    if (strlen($username) < 3) {
        $failure .= "Username must be at least 3 characters\n";
    }
    if (strlen($password) < 8) {
        $failure .= "Password must be at least 8 characters\n";
    }

    if ($failure === "") {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO tbl_admin (full_name, username, password) VALUES (?, ?, ?)"
            );
            mysqli_stmt_bind_param($stmt, 'sss', $fullname, $username, $hash);
            mysqli_stmt_execute($stmt);
            $_SESSION['add'] = "Admin Addition of " . htmlspecialchars($fullname) . " Successful";
        } catch (mysqli_sql_exception $e) {
            $_SESSION['add'] = "Admin Addition Failed";
        }
    } else {
        $_SESSION['failure'] = $failure;
    }

    header('Location: ' . HOMEPAGE . 'admin/manage-admin.php');
    exit;
}
