<?php include('./partials/header.php');?>
<main class="container">
    <div class="col-4 align-self-start border-bottom border-3">
        <h1>Contact Skye</h1>
    </div>
    <div class="col-md-7 col-lg-8">
        <form class="needs-validation" method= "post" novalidate>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="" required>
                    <div class="invalid-feedback">
                        Valid is required.
                    </div>
                </div>

                <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
                <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                    Please enter a valid email address for updates.
                </div>
                </div>
                
                <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Submit Message</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['submit'])){
        //get form data
        //mysqli_real_escape_string used to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $message_category = mysqli_real_escape_string($conn, $_POST['message_category']);

        $valid = 1;
            
        //TODO:input validation
        //if all fields are valid, attempt to add the new item
        if($valid == 1){
            //SQL query
                $sql = "INSERT INTO tbl_contact SET
                name = '$name',
                email = '$email',
                message = '$message',
                message_category = '$message_category'
            ";
            //Execute query
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "Message Sent Successfully";
            }else{
                echo "Message Failed to Send";
            }
        }else{
            echo "Message Failed to Send";
        }
    }
    ?>
</main>
<?php include('./partials/footer.php');?>