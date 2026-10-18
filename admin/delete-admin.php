<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    /** @var mysqli $conn */

    $id=$_GET['id'];
    $sql="DELETE FROM tbl_admin WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['delete'] = "Admin with id $id deleted successfully";
        header('Location:'.HOMEPAGE.'/admin/manage-admin.php');
        exit();
    }else{
        $_SESSION['delete'] = "Admin with id $id could not be deleted";
        header('Location:'.HOMEPAGE.'/admin/manage-admin.php');
        exit();
    }
?>