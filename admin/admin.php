<?php
include('./partials/check-login.php');
include('./partials/navbar.php'); ?>
<!-- Main Content Start -->
<div class="container main-content px-5 py-2">
    <div class="wrapper my-4">
        <h1>Welcome <?php echo $_SESSION['user'] ?>!</h1>
    </div>
    <div class="row">
        <div class="admin-home-col col">
            <a href="<?php echo HOMEPAGE; ?>admin/manage-admin.php">Manage Admins</a>
        </div>
        <div class="admin-home-col col">
            <a href="<?php echo HOMEPAGE; ?>admin/manage-posts.php"> Manage Posts</a>
        </div>
        <div class="admin-home-col col">
            <a href="<?php echo HOMEPAGE; ?>admin/manage-events.php">Manage Events</a>
        </div>
    </div>
</div>
<!-- Main Content End -->
<?php include("partials/footer.php"); ?>