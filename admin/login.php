<?php session_start();
include('../private_html/constants.php'); ?>
<html>
    <head>
        <title>Seeds of Sage Admin Login </title>
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['signed-out'])){
                    echo $_SESSION['signed-out'];
                    unset($_SESSION['signed-out']);
                }
            ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label" placeholder="Username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="submit" value="login" class="btn btn-primary">Submit</button>
            </form>
<!--
            <form action="" method="POST">
                <h2>Username:</h2>
                <input type="text" name="username" placeholder="Enter Username">
                <h2>Password:</h2>
                <input type="text" name="password" placeholder="Enter Password">
                <br><br>
                <input type="submit" name="submit" value="login" class="btn">
            </form> -->
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        //if the query executes and an admin is found

        if($result){
            if(mysqli_num_rows($result) == 1){
                $_SESSION['login'] = "Login Successful\n";
                $_SESSION['user'] = $username;

                header("location:".HOMEPAGE."/admin/manage-admin.php");
            }else{
                $_SESSION['login'] = "Incorrect Username or Password\n";
                header("location:".HOMEPAGE."/login.php");
            }
        }else{
            echo "query failed";
        }
    }
?>