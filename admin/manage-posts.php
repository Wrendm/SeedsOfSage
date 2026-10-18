<?php include('config/constants.php'); ?>
<?php include("./partials/navbar.php"); ?>
        <!-- Main Content Start -->
        <div class="main-content">
            <div class="wrapper">
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
                <h2><a href="<?php echo HOMEPAGE;?>/admin/add-post.php">Add Post</a>
                <table class="table">
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
                                    <td><?php echo $content?></td>
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
            </div>
        </div>
        <!-- Main Content End -->
<?php include("./partials/footer.php"); ?>