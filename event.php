<?php include('./partials/header-off-canvas.php');?>
<?php include('../private_html/constants.php'); ?>
    <main class="container flex-shrink-0 d-flex flex-column">
    <div class="row">
        <div class="col-12 align-self-start mx-5 pt-4">
            <a href="https://seedsofsagecounseling.com/calendar" style="color:#49574d;"><p> ... Back to Calendar</p></a>
        </div>
    </div>
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_events WHERE id=$id";
            }else{
                echo "<div class='text-center'><h1>No posts to show!</h1></div>";
            }
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) == 1){
                $post=mysqli_fetch_assoc($result);
                $title = $post['title'];
                $description = $post['description'];
                $date = $post['date'];
                $time = $post['time'];
                $location = $post['location'];
            ?>
            <div class="row py-3">
                <div class="col-12 align-self-start border-bottom border-3" style="border-bottom-color: #7fa180 !important;">
                    <h1><?php echo $title?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-self-start">
                    <p style="font-style: italic;"><?php echo $date?>, <?php echo $time?></p>
                    <p style="font-style: italic;"><?php echo $location?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 align-self-start mx-5 pb-5">
                    <p><?php echo $description?></p>
                </div>
            </div>
            <?php 
            }else{
                echo "<div class='text-center'><h1>Event Post Not Found!</h1></div>";
            }
            ?>
    </main>
<?php include('./partials/footer.php');?>