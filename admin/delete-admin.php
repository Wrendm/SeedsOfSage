<?php 
    include('config/constants.php');

    $id=$_GET['id'];
    $sql="DELETE FROM tbl_admin WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result == true){
        $_SESSION['delete'] = "Admin with id $id deleted successfully";
        header('Location:'.HOMEPAGE.'admin/manage-admin.php');
    }else{
        $_SESSION['delete'] = "Admin with id $id could not be deleted";
        header('Location:'.HOMEPAGE.'admin/manage-admin.php');
    }
?>