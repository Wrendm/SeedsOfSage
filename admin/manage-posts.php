<?php
    include("./partials/navbar.php"); 
    /** @var mysqli $conn */?>
        <!-- Main Content Start -->
        <div class="container main-content px-5 py-2">
            <div class="main-content">
                <div class="wrapper my-4">
                    <h1>Manage Posts</h1>
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
                    <table class="table" style="background-color: #fff;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                        </tr>
                        <?php 
                            //retrieve admins from database
                            $sql = "SELECT * FROM tbl_posts";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                                while ($posts = mysqli_fetch_assoc($result)){
                                    
                                    $id = $posts['id'];
                                    $title= $posts['title'];
                                    $content = $posts['content'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $title?></td>
                                        <td><?php echo preg_split('/\./', $content)[0] . '.[...]'?></td>
                                        <td>
                                            <a href="<?php echo HOMEPAGE;?>/admin/update-post.php?id=<?php echo $id;?>" class="btn-primary">Update Post</a>
                                            <br>
                                            <!--TODO: add an "are you sure?" popup-->
                                            <a href="<?php echo HOMEPAGE;?>/admin/delete-post.php?id=<?php echo $id;?>" class="btn-primary" style="color:#520000">Delete Post</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                    <div class="row my-3 justify-content-center">
                        <div class="col-2 d-flex justify-content-center">
                            <a href="add-post.php" class="btn btn-light" role="button">Add Post</a>
                        </div>  
                    </div>     
                </div>
            </div>
        </div>
        <!-- Main Content End -->
<?php include("./partials/footer.php"); ?>