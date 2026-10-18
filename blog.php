<?php include('./partials/header.php');?>
<?php include('../private_html/constants.php'); ?>
    <main class="container flex-shrink-0 d-flex flex-column">
        <div class="row mt-4">
            <h2>Seeds of Sage Blog</h2>
        </div>
        <div class ="row my-4">
            <?php
            $sql = "SELECT * FROM tbl_posts";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row=mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $published = $row['date'];
                    $content = explode("<br />", $row['content'])[0] . "[...]";
                    ?>
                    <div class="card px-0">
                        <div class="card-header">
                            <h5><?php echo $title?></h5>
                            <p style="font-style: italic; margin:0;">Published on <?php echo $published?></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $content?></p>
                            <a href="./post.php?id='<?php echo $id;?>'" class="btn btn-secondary">Read Full Post</a>
                        </div>
                    </div>
                    <?php 
                }
            }else{
                echo "<div class='text-center'><h1>No posts to show!</h1></div>";
            }
            ?>
        </div>
    </main>
<?php include('./partials/footer.php');?>