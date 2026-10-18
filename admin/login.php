<?php
  require_once __DIR__ . '/config/constants.php';
?>

<html>
    <head>
        <title>Seeds of Sage Admin Login </title>
        <link href="../seedsofsage.css?<?php echo time(); ?>" rel="stylesheet"> 
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sticky-footer/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login m-4">
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
        </div>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        //if the query executes and an admin is found

        if($result){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $hashed = $row['password'];
            if(password_verify($password, $hashed)){
                if(mysqli_num_rows($result) == 1){
                    $_SESSION['login'] = "Login Successful\n";
                    $_SESSION['user'] = $username;
    
                    header("location:".HOMEPAGE."admin/admin");
                }else{
                    $_SESSION['login'] = "Incorrect Username or Password\n";
                    header("location:".HOMEPAGE."admin/login");
                }
            }else{
                $_SESSION['login'] = "Incorrect Username or Password\n";
                header("location:".HOMEPAGE."admin/login");
            }
        }else{
            echo "query failed";
        }
    }
?>