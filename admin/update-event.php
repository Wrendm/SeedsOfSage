<?php session_start();
    include('../../private_html/constants.php'); 
    include('./partials/navbar.php'); ?>
<div>
    <h1>Edit Event</h1>
    <?php 
        //TODO: securitize this against code injection etc
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_events WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        //if the id exists in the table exactly once get the corresponding row
        if($result == true){
            if(mysqli_num_rows($result) == 1){
                $row=mysqli_fetch_assoc($result);
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $date = $row['date'];
                $time = $row['time'];
                $location = $row['location'];   
                $active = $row['active'];         
            }else{
                $_SESSION['failure'] = "Event with id $id could not be found to update";
                header("Location:".HOMEPAGE.'/admin/manage-events');
            } 
        }else{
            $_SESSION['failure'] = "Event with id $id could not be found to update";
            header("Location:".HOMEPAGE.'/admin/manage-events');
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td>Description: </td>
                <td>
                    <textarea class="form-control" name="description" rows="10" style="height:100%;"><?php echo $description;?></textarea>
                </td>
            </tr>
             <tr>
                <td>Date: </td>
                <td>
                    <input type="date" name="date" value="<?php echo $date?>">
                </td>
            </tr>
            <tr>
                <td>Time: </td>
                <td>
                    <input type="time" name="time" value="<?php echo $time?>">
                </td>
            </tr>
            <tr>
                <td>Location: </td>
                <td>
                    <input type="text" name="location" value="<?php echo $location;?>">
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Update Event">
                </td>
            </tr>
        </table>
    </form>
    <?php
    //process form information to update category in the database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $description = strtr($_POST['description'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $active = $_POST['active'];
    
        //SQL query
        $sql2 = "UPDATE tbl_events SET
            title = '$title',
            description = '$description',
            date = '$date',
            time = '$time',
            location = '$location',   
            active = '$active'        
            WHERE id=$id
        ";
        //Execute query
        $result2 = mysqli_query($conn, $sql2);
        if($result2 == True){
            $_SESSION['add'] = "Update of $title Successful";
            header('Location:'.HOMEPAGE.'/admin/manage-events');
        }
        else{
            $_SESSION['add'] = "Update of $title Failed";
            header('Location:'.HOMEPAGE.'/admin/manage-events');
        }
    }
?>
</div>
<?php include("./partials/footer.php"); ?>