<?php session_start();
    include('../../private_html/constants.php'); 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $id=$_GET['id'];
    $sql="DELETE FROM tbl_posts WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['delete'] = "Post with id $id deleted successfully";
        header('Location:'.HOMEPAGE.'/admin/manage-posts');
        exit();
    }else{
        $_SESSION['delete'] = "Post with id $id could not be deleted";
        header('Location:'.HOMEPAGE.'/admin/manage-posts');
        exit();
    }
?>