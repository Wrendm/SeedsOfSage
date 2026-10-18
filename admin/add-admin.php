<?php
include("partials/navbar.php"); ?>
<div class="container-fluid">
    <div class="main-content my-3">
        <div class="row">
            <div class="col-4">
                <h1>Add Admin</h1>
                <form action="validate-new-admin.php" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label" placeholder="Username">Full Name</label>
                        <input type="text" name="fullname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label" placeholder="Username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" name="submit" value="login" class="btn btn-light">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("partials/footer.php"); ?>
