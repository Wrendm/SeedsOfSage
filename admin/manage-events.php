<?php
    include("./partials/navbar.php"); 
    /** @var mysqli $conn */?>
        <!-- Main Content Start -->
        <div class="container-fluid">
            <div class="main-content">
                <div class="wrapper">
                <h1>Manage Events</h1>
                    <?php 
                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['failure'])){
                            echo $_SESSION['failure'];
                            unset($_SESSION['failure']);
                        }
                        if(isset($_SESSION['value'])){
                            echo $_SESSION['value'];
                            unset($_SESSION['value']);
                        }
                    ?>
                    <table class="table">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Location</th>
                            <th scope="col">Active</th>
                        </tr>
                        <?php 
                            //retrieve admins from database
                            $sql = "SELECT * FROM tbl_events";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                                while ($events = mysqli_fetch_assoc($result)){
                                    
                                    $id = $events['id'];
                                    $title = $events['title'];
                                    $description = $events['description'];
                                    $date = $events['date'];
                                    $time = $events['time'];
                                    $location = $events['location'];   
                                    $active = $events['active'];                                 
                                    ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $title?></td>
                                        <td><?php echo $description?></td>
                                        <td><?php echo $date?></td>
                                        <td><?php echo $time?></td>
                                        <td><?php echo $location?></td>
                                        <td><?php echo $active?></td>
                                        <td>
                                            <a href="<?php echo HOMEPAGE;?>/admin/update-event.php?id=<?php echo $id;?>" class="btn-primary">Update Event</a>
                                            <br>
                                            <!--TODO: add an "are you sure?" popup-->
                                            <a href="<?php echo HOMEPAGE;?>/admin/delete-event.php?id=<?php echo $id;?>" class="btn-primary" style="color:#520000">Delete Event</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-2 d-flex justify-content-center">
                            <a href="<?php echo HOMEPAGE;?>/admin/add-event.php" class="btn btn-light" role="button">Add Event</a>
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
        <!-- Main Content End -->
<?php include("./partials/footer.php"); ?>