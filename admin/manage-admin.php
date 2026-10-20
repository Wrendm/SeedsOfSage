<?php
    include("./partials/navbar.php"); 
    /** @var mysqli $conn */?>
        <!-- Main Content Start -->
        <div class="container main-content px-5 py-2">
            <div class="main-content my-3">
                <div class="wrapper my-4">
                    <h1>Manage Admin</h1>
                    <?php 
                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        if(isset($_SESSION['login'])){
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        if(isset($_SESSION['failure'])){
                            echo $_SESSION['failure'];
                            unset($_SESSION['failure']);
                        }
                    ?>
                    
                    <table class="table">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Options</th>
                        </tr>
                        <?php 
                            //retrieve admins from database
                            $sql = "SELECT * FROM tbl_admin";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                                while ($admins = mysqli_fetch_assoc($result)){
                                    
                                    $id = $admins['id'];
                                    $fullname = $admins['full_name'];
                                    $username = $admins['username'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $fullname?></td>
                                        <td><?php echo $username?></td>
                                        <td>
                                            <a href="<?php echo HOMEPAGE;?>/admin/update-admin.php?id=<?php echo $id;?>" class="btn-primary">Update Admin</a>
                                            <br>
                                            <!--TODO: add an "are you sure?" popup-->
                                            <a href="<?php echo HOMEPAGE;?>/admin/delete-admin.php?id=<?php echo $id;?>" class="btn-primary" style="color:#520000">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-2 d-flex justify-content-center">
                            <a href="add-admin.php" class="btn btn-light" role="button">Add Admin</a>
                        </div>  
                    </div>              
                </div>
            </div>
        </div>
        <!-- Main Content End -->
<?php include("./partials/footer.php"); ?>