<?php
include('check-login.php'); ?>
<html>

<head>
    <title>Seeds of Sage Admin Homepage</title>
    <link href="../seedsofsage.css?<?php echo time(); ?>" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sticky-footer/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <!--Navbar Section Start -->
    <nav class="adminNavbar navbar navbar-expand">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?php echo HOMEPAGE; ?>admin/admin.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo HOMEPAGE; ?>admin/manage-admin.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo HOMEPAGE; ?>admin/manage-posts.php">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo HOMEPAGE; ?>admin/manage-events.php">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo HOMEPAGE; ?>admin/logout.php" style="color:#520000">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <!--Toolbar Section End -->