<?php 
    include('./partials/navbar.php');
?>
<div>
    <h1>Add Item</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Item Title">
                </td>
            </tr>
            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" placeholder="Item Description"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" min="0">
                </td>
            </tr>
            <tr>
                <td>Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Category ID: </td>
                <td>
                    <select name="category">
                        <?php 
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                                while ($categories = mysqli_fetch_assoc($result)){
                                    $id = $categories['id'];
                                    $title= $categories['title'];
                                    ?>
                                    <option value="<?php echo $id?>"><?php echo $title?></option>
                                    <?php 
                                }
                            }else{?>
                                <option value="0">No existing active categories</option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Add Item" class="">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }else{
            $featured = "No";
        }
        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "Yes";
        }

        $valid = 1;
        $failure = "";
        //input validation
        if(strlen($title) < 1){
            $failure .= "Item title is required\n";
            $valid = 0;
        }
        if(strlen($description) < 1){
            $failure .= "Item description is required\n";
            $valid = 0;
        }
        if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path= "../images/items/".$image_name;
            $ext = end(explode('.', $image_name));
            //check if the file is an image or not. if not, exit and give an error message
            if($ext != "jpeg" and $ext != "png" and $ext != "jpg"){
                $_SESSION['failure'] = "File is not a valid type, must be JPG, JPEG, or PNG\n";
                $valid = 0;
            }
            $upload = move_uploaded_file($source_path, $destination_path);
            if($upload==False){
                $_SESSION['upload'] = "Failed to Upload Image to Item\n";
                header('Location:'.HOMEPAGE.'admin/manage-items.php');
                die();
            }
        }else{
            $image_name="";
            $_SESSION['upload'] = "Failed to Upload Image\n";
        }
        
        //if all fields are valid, attempt to add the new item
        if($valid == 1){
            //SQL query
            $sql2 = "INSERT INTO tbl_item SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
            ";
            //Execute query
            $result = mysqli_query($conn, $sql2);
            if($result){
                $_SESSION['add'] = "Item Addition of $title Successful";
                header('Location:'.HOMEPAGE.'/admin/manage-items.php');
            }
            else{
                $_SESSION['add'] = "Item Addition of $title Failed\n
                $title $description $price $image_name $category $featured $active\n";
                header('Location:'.HOMEPAGE.'/admin/manage-items.php');
            }
        }else{
            $_SESSION['add'] = "Item Addition Failed";
            header('Location:'.HOMEPAGE.'/admin/manage-items.php');
        }
    }
?>
</div>
<?php include("partials/footer.php"); ?>