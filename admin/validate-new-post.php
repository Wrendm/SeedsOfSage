<?php session_start();
include('../../private_html/constants.php');
include('./partials/check-login.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
    //process form information to add admin to database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $content = strtr($_POST['content'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
        $date = date("Y/m/d");


        $valid = 1;
        $failure = "";
        //input validation
        if(strlen($title) < 1){
            $failure .= "Post title is required\n";
        }
        if(strlen($content) < 1){
            $failure .= "Post text is required\n";
        }
        
        if($valid == 1){
            $stmt = $conn->prepare("INSERT INTO tbl_posts (title, content, date) VALUES (?, ?, STR_TO_DATE(?, '%Y/%m/%d'))");

            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind parameters: "sss" = 3 strings
            $stmt->bind_param("sss", $title, $content, $date);
            // Close statement

            if($stmt->execute()){
                $_SESSION['add'] = "Blog Addition of $title Successful";
                $stmt->close();
                header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
            }
            else{
                $_SESSION['add'] = "Blog Addition of $title Failed";
                $stmt->close();
                header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
            }
        }else{
            $_SESSION['add'] = "Blog Addition Failed";
            $stmt->close();
            header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
        }
    }else{
        $failure .= "didn't pass the first if statement\n";
        $_SESSION['failure'] = $failure;
        $stmt->close();
        header('Location:'.HOMEPAGE.'/admin/manage-admin.php');
    }
?>