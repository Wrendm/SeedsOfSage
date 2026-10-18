<?php
    include('partials/navbar.php');
?>
<div class="container-fluid">
    <div class="main-content my-3">
        <h1>Add Blog Post</h1>
        <form action="validate-new-post.php" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Post Title" name="title">
            </div>
            <div class="input-group">
                <textarea class="form-control" name="content" rows="10" style="height:100%;"></textarea>
            </div>
            <button type="submit" name="submit" value="Add Post" class="btn btn-light">Submit</button>
        </form>
    </div>
</div>
<?php include("./partials/footer.php"); ?>