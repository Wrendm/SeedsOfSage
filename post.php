<?php include('./partials/header.php');?>
<?php include('../private_html/constants.php'); ?>
    <main class="container flex-shrink-0 d-flex flex-column">
    <div class="row">
        <div class="col-12 align-self-start mx-5 pt-4">
            <a href="https://seedsofsagecounseling.com/blog.php" style="color:#49574d;"><p> ... Back to All Posts</p></a>
        </div>
    </div>
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_posts WHERE id=$id";
            }else{
                echo "<div class='text-center'><h1>No posts to show!</h1></div>";
            }
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1){
                $post=mysqli_fetch_assoc($result);
                $id = $post['id'];
                $title = $post['title'];
                $published = $post['date'];
                $content = $post['content'];
            ?>
            <div class="row py-3">
                <div class="col-12 align-self-start border-bottom border-3">
                    <h1><?php echo $title?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-self-start">
                    <p style="font-style: italic;">Published on <?php echo $published?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-self-start mx-5 pb-5">
                    <p><?php echo $content?></p>
                </div>
            </div>
            <?php 
            }else{
                echo "<div class='text-center'><h1>Blog Post Not Found!</h1></div>";
            }
            ?>
    </main>
<?php include('./partials/footer.php');?>