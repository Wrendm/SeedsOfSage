<?php include('./partials/header-off-canvas.php');?>
<?php include('./partials/calendar-class.php');
/** @var mysqli $conn */?>
    <main class="container px-5 py-2">
        <div class="row mt-4">
            <h1>Seeds of Sage Event Calendar</h1>
        </div>
        <div class ="row my-4">
            <?php
            $calendar = new Calendar();
            $today = date("Y-m-d");
            $datepicked = date('Y-m-01', strtotime($today));
            $sql = "SELECT * FROM tbl_events WHERE active='Yes'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row=mysqli_fetch_assoc($result)){
                    $calendar->add_event($row['id'], $row['title'], $row['description'], $row['date'], $row['time'], $row['location']);
                }
            }else{
                echo "<div class='text-center'><h1>No posts to show!</h1></div>";
            }
            echo $calendar;
            ?>
        </div>
    </main>
<?php include('./partials/footer.php');?>