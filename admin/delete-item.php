<?php 
    include('config/constants.php');
    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != ""){
            //remove the image then delete the item
            $image_delete = unlink('../images/items/'.$image_name);
            if(!$image_delete){
                $_SESSION['failure'] = "image could not be deleted";
                header('Location:'.HOMEPAGE.'admin/manage-items.php');
            }else{
                $sql="DELETE FROM tbl_item WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                if($result == true){
                    $_SESSION['delete'] = "Category with id $id deleted successfully";
                    header('Location:'.HOMEPAGE.'admin/manage-items.php');
                }else{
                    $_SESSION['delete'] = "Category with id $id could not be deleted";
                    header('Location:'.HOMEPAGE.'admin/manage-items.php');
                }
            }
            
        }else{
            $_SESSION['failure'] = 'attempted to delete an item with no image';
            header('Location:'.HOMEPAGE.'admin/manage-items.php');
        }

    }else{
        $_SESSION['failure'] = 'item could not be deleted';
        header('Location:'.HOMEPAGE.'admin/manage-items.php');
    }
?>