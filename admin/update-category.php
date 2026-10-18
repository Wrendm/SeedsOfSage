<?php include('partials/navbar.php'); ?>
<div>
    <h1>Change Category</h1>
    <?php 
        //TODO: securitize this against code injection etc
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_category WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        //if the id exists in the table exactly once get the corresponding row
        if($result == true){
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_assoc($result);
                $title= $row['title'];
                $current_image =$row['image_name'];
                $featured =$row['featured'];
                $active =$row['active'];
            }else{
                $_SESSION['failure'] = "Category with id $id could not be found to update";
                header("Location:".HOMEPAGE.'/../private_html/admin/manage-category.php');
            } 
        }else{
            $_SESSION['failure'] = "Category with id $id could not be found to update";
            header("Location:".HOMEPAGE.'/../private_html/admin/manage-category.php');
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Category Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td> Current Image: </td>
                <td>
                    <img src="<?php echo HOMEPAGE;?>images/categories/<?php echo $current_image; ?>" width="100px">
                </td>
            </tr>
            <tr> <!-- TODO: provide the option to remove image without uploading a replacement-->
                <td>Replace Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes" <?php if($featured == "Yes"){echo "checked";} ?>> Yes
                    <input type="radio" name="featured" value="No" <?php if($featured == "No"){echo "checked";} ?>> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes" <?php if($active == "Yes"){echo "checked";} ?>> Yes
                    <input type="radio" name="active" value="No" <?php if($active == "No"){echo "checked";}?>> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Category" class="">
                </td>
            </tr>
        </table>
    </form>
    <?php
    //process form information to update category in the database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        
        if(isset($_FILES['image']['name'])){
            $new_img=$_FILES['image']['name'];
            if($new_img != ""){
                $source_path=$_FILES['image']['tmp_name'];
                //$ext = end(explode('.', $new_img));
                //$new_img = $title.rand(000,1000).'.'.$ext;
                $destination_path= "../images/categories/".$new_img;
                $_SESSION['value'] = "Title: $title Image: $new_img\n";
                $upload = move_uploaded_file($source_path, $destination_path);
                if($upload==False){
                    $_SESSION['upload'] = "Failed to Upload Image";

                    header('Location:'.HOMEPAGE.'admin/manage-category.php');
                    die();
                }
                $image_delete = unlink("../images/categories/".$current_image);
                if($image_delete == False){
                    $_SESSION['failure'] = "category image could not be deleted";
                    header('Location:'.HOMEPAGE.'admin/manage-category.php');
                }
            }else{
                $new_img = $current_image;
            }
        }else{
            $new_img = $current_image;
        }

        $valid = 1;
        //TODO:input validation
        //if all fields are valid, attempt to add the new category
        if($valid == 1){
            //SQL query
            $sql2 = "UPDATE tbl_category SET
                title = '$title',
                image_name = '$new_img',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
            ";
            //Execute query
            $result2 = mysqli_query($conn, $sql2);
            if($result2 == True){
                $_SESSION['add'] = "Category Update of $title Successful";
                header('Location:'.HOMEPAGE.'admin/manage-category.php');
            }
            else{
                $_SESSION['add'] = "Category Update of $title Failed $id $current_image $new_img $featured $active";
                header('Location:'.HOMEPAGE.'admin/manage-category.php');
            }
        }else{
            $_SESSION['add'] = "Category Update Failed";
            header('Location:'.HOMEPAGE.'admin/manage-category.php');
        }
    }
?>
</div>
<?php include("/../private_html/partials/footer.php"); ?>