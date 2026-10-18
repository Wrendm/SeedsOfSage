<?php 
    include('./partials/navbar.php');
    include('config/constants.php'); 
?>
<div>
    <h1>Add Blog Post</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Post Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Post Title">
                </td>
            </tr>
            <tr>
                <td>Post Content:</td>
                <td>
                    <textarea name="content"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Add Post" class="">
                </td>
            </tr>
        </table>
    </form>
    <?php
    //process form information to add admin to database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $content = strtr($_POST['content'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));


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
            //SQL query
            $sql = "INSERT INTO tbl_posts SET
                title = '$title',
                content = '$content'
            ";
            //Execute query
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['add'] = "Blog Addition of $title Successful";
                header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
            }
            else{
                $_SESSION['add'] = "Blog Addition of $title Failed";
                header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
            }
        }else{
            $_SESSION['add'] = "Blog Addition Failed";
            header('Location:'.HOMEPAGE.'/admin/manage-posts.php');
        }
    }
?>
</div>
<?php include("./partials/footer.php"); ?>