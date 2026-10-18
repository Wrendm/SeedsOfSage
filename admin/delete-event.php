<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    /** @var mysqli $conn */

    $id=$_GET['id'];
    $sql="DELETE FROM tbl_events WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['delete'] = "Event with ID: $id deleted successfully";
        header('Location:'.HOMEPAGE.'/admin/manage-events');
        exit();
    }else{
        $_SESSION['delete'] = "Event with ID: $id could not be deleted";
        header('Location:'.HOMEPAGE.'/admin/manage-events');
        exit();
    }
?>