<?php
    include("./partials/navbar.php");
    /** @var mysqli $conn */?>
    <div class="main-content">
        <h1>Update Admin</h1>
        <?php 
            //TODO: securitize this against code injection etc
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if($result == true){
                if(mysqli_num_rows($result) == 1){
                    $row=mysqli_fetch_assoc($result);
                    $fullname=$row['full_name'];
                    $username=$row['username'];
                }else{
                    $_SESSION['failure'] = "Admin with id $id could not be found to update";
                    header("Location:".HOMEPAGE.'admin/manage-admin.php');
                } 
            }
        ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Full Name: </td>    
                    <td><input type = "text" name="fullname" value="<?php echo $fullname?>"></td>
                </tr>
                <tr>
                    <td>Username: </td>    
                    <td><input type = "text" name="username" value="<?php echo $username?>"></td>
                </tr>
                <tr>  
                    <td><input type = "submit" name="submit" value="Update Admin" class=""></td>
                </tr>
            </table>
        </form>
    </div>
<?php 
    if(isset($_POST['submit'])){
        $newFullName = $_POST["fullname"];
        $newUsername = $_POST["username"];
        
        $sql = "UPDATE tbl_admin SET
        full_name = '$newFullName',
        username = '$newUsername'
        WHERE id='$id'
        ";
        $result = mysqli_query($conn,$sql);
        //TODO: create a function in another file for all of these redundant error messages
        if($result == true){
            $_SESSION['update'] = "Admin with id $id updated successfully\n";
            header('Location:'.HOMEPAGE.'/../private_html/admin/manage-admin.php');
        }else{
            $_SESSION['update'] = "Admin with id $id could not be updated\n";
            header('Location:'.HOMEPAGE.'/../private_html/admin/manage-admin.php');
        }
    }
?>

<?php include("/../private_html/admin/partials/footer.php");?>