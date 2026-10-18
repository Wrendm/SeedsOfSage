<?php session_start();
    include('../../private_html/constants.php'); 
    include('./partials/navbar.php'); ?>
<div>

<div class="container-fluid">
<div class="main-content my-3">
    <h1>Change Category</h1>
    <?php 
        //TODO: securitize this against code injection etc
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_posts WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        //if the id exists in the table exactly once get the corresponding row
        if($result == true){
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_assoc($result);
                $title= $row['title'];
                $content =$row['content'];
            }else{
                $_SESSION['failure'] = "Post with id $id could not be found to update";
                header("Location:".HOMEPAGE.'/admin/manage-posts');
            } 
        }else{
            $_SESSION['failure'] = "Category with id $id could not be found to update";
            header("Location:".HOMEPAGE.'/admin/manage-posts');
        }
    ?>
<div class="row">
<div class="col-10">
    <form action="" method="post" enctype="multipart/form-data">
        <p>Title</p> 
        <div class="input-group mb-3">
            <input type="text" name="title" style="width:100%;" value="<?php echo $title;?>">
        </div>
        <p>Content:</p> 
        <div class="input-group mb-3">
            <textarea class="form-control" name="content" rows="10" style="height:100%; width:100%;"><?php echo $content;?></textarea>
        </div>
        <div class="input-group mb-3">
            <input type="submit" name="submit" value="Update Post" class="">
        </div>
    </form>
    <?php
    //process form information to update category in the database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $content = strtr($_POST['content'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));

        //SQL query
        $sql2 = "UPDATE tbl_posts SET
            title = '$title',
            content = '$content'
            WHERE id=$id
        ";
        //Execute query
        $result2 = mysqli_query($conn, $sql2);
        if($result2 == True){
            $_SESSION['add'] = "Post Update of $title Successful";
            header('Location:'.HOMEPAGE.'/admin/manage-posts');
        }
        else{
            $_SESSION['add'] = "Post Update of $title Failed";
            header('Location:'.HOMEPAGE.'/admin/manage-posts');
        }
    }
?>
</div>
<?php include("./partials/footer.php"); ?>