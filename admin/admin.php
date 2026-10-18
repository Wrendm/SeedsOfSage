<?php
include('./partials/check-login.php');
include('./partials/navbar.php'); ?>
        <!-- Main Content Start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Welcome <?php echo $_SESSION['user']?>!</h1>
            </div>
        </div>
        <!-- Main Content End -->
<?php include("partials/footer.php"); ?>