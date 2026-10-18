<?php include('C:\xampp\htdocs\SeedsOfSage-LOCAL\admin\config\constants.php'); ?>
<?php include("./partials/navbar.php"); ?>
        <!-- Main Content Start -->
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
                <h2><a href="<?php echo HOMEPAGE;?>/admin/add-event.php">Add Event</a>
                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Time</th>
                        <th scope="col">Date</th>
                    </tr>
                    <?php 
                        //retrieve admins from database
                        $sql = "SELECT * FROM tbl_events";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)){
                            while ($events = mysqli_fetch_assoc($result)){
                                
                                $id = $items['id'];
                                $name = $events['name'];
                                $time = $events['time'];
                                $date = $events['date'];
                                ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $name?></td>
                                    <td><?php echo $time?></td>
                                    <td><?php echo $date?></td>
                                    <td>
                                        <a href="<?php echo HOMEPAGE;?>/admin/update-item.php?id=<?php echo $id;?>" class="btn-primary">Update Item</a>
                                        <br>
                                        <!--TODO: add an "are you sure?" popup-->
                                        <a href="<?php echo HOMEPAGE;?>/admin/delete-item.php?id=<?php echo $id;?>&image_name=<?php echo $image_name?>" class="btn-primary" style="color:#520000">Delete Item</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
        <!-- Main Content End -->
<?php include("./partials/footer.php"); ?>