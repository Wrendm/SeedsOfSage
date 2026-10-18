<?php 
    include('config/constants.php');
    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            //remove the image then delete the category
            $image_delete = unlink("../images/categories/".$image_name);
            if(!$image_delete){
                $_SESSION['failure'] = "category image could not be deleted";
                header('Location:'.HOMEPAGE.'admin/manage-category.php');
            }else{
                $sql="DELETE FROM tbl_category WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                if($result == true){
                    $_SESSION['delete'] = "Category with id $id deleted successfully";
                    header('Location:'.HOMEPAGE.'admin/manage-category.php');
                }else{
                    $_SESSION['delete'] = "Category with id $id could not be deleted";
                    header('Location:'.HOMEPAGE.'admin/manage-category.php');
                }
            }
            
        }else{
            $_SESSION['failure'] = 'attempted to delete a category with no image';
            header('Location:'.HOMEPAGE.'admin/manage-category.php');
        }

    }else{
        header('Location:'.HOMEPAGE.'admin/manage-category.php');
    }
?>