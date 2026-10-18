<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['signed-out'] = "Unauthorized Access Attempt: Log In or contact site administrator";
        header("Location:".HOMEPAGE."admin/login.php");
    }
?>