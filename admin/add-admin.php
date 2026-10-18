<?php include("partials/navbar.php"); ?>
<!--Styling excluded from all admin pages for simplicity-->
<div class="main-content">
    <h1>Add admin</h1>
    <form action="" method="POST">
        <table>
            <tr>
            <td>Full Name: </td>    
            <td><input type = "text" name="fullname" placeholder="Enter your name"></td>
            </tr>
            <tr>
            <td>Username: </td>    
            <td><input type = "text" name="username" placeholder="Enter your username"></td>
            </tr>
            <tr>
            <td>Password: </td>    
            <td><input type = "password" name="password" placeholder="Enter your password"></td>
            </tr>
            <tr>  
            <td><input type = "submit" name="submit" value="Add Admin" class=""></td>
            </tr>
        </table>
    </form>
</div>

<?php include("partials/footer.php"); ?>

<?php
    //process form information to add admin to database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        //input validation
        $failure = "";
        $valid = 1;
        //check that full name contains a space and isn't a number
        if(!(str_contains($fullname, ' ') || !(preg_match("#^[a-zA-Z]+$#", $fullname)))){
            $failure .= "Name not a full name\n";
            $valid = 0;
        }else{
            $fullname = trim($fullname);
        }
        //check that username is at least 3 characters
        if(!(strlen($username) >= 3)){
            $failure .= "Username must be at least 3 characters\n";
            $valid = 0;
        }else{
            $username = trim($username);
        }
        //check that password is at least 8 characters
        if(!(strlen($password) >= 8)){
            $failure .= "Password must be at least 8 characters\n";
            $valid = 0;
        }else{
            $password = trim($password);
        }
        //if all fields are valid, attempt to add the new admin
        if($valid == 1){
            //SQL query
            $sql = "INSERT INTO tbl_admin SET
                full_name = '$fullname',
                username = '$username',
                password = '$password'
            ";
            //Execute query
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['add'] = "Admin Addition of $fullname Successful";
                header('Location:'.HOMEPAGE.'admin/manage-admin.php');
            }
            else{
                $_SESSION['add'] = "Admin Addition of $fullname Failed";
                header('Location:'.HOMEPAGE.'admin/manage-admin.php');
            }
        }else{
            $_SESSION['failure'] = $failure;
            header('Location:'.HOMEPAGE.'admin/manage-admin.php');
        }
    }
?>