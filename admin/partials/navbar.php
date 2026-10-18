<?php 
include('C:\xampp\htdocs\SeedsOfSage-LOCAL\admin\config\constants.php');
include('check-login.php');?>

<html>
    <head>
        <title>Seeds of Sage Admin Homepage</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!--Navbar Section Start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="./admin.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="./manage-admin.php">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="./manage-posts.php">Posts</a></li>     
                        <li class="nav-item"><a class="nav-link" href="./manage-events.php">Events</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php" style="color:#520000">Log Out</a></li>
                    </ul>
                </div>
            </div>
            </nav>
        </div>
        <!--Toolbar Section End -->