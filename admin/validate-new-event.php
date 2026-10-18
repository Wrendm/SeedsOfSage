<?php session_start();
include('../../private_html/constants.php');
include('./partials/check-login.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
    //process form information to add event to database
    //check submit button clicked
    if(isset($_POST['submit'])){
        //get form data
        $title = $_POST['title'];
        $description = strtr($_POST['description'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));

        $date = date('Y/m/d', strtotime($_POST['date']));
        echo $date; echo '</br>';
        $time = $_POST['time'];
        echo $time; echo '</br>';

        $location = $_POST['location'];   
        echo $location; echo '</br>';

        if(isset($_POST['active'])){
            $active = $_POST['active'];
        }else{
            $active = "No";
        }

        $valid = 1;
        $failure = "";
        //input validation
        if(strlen($title) < 1){
            $failure .= "Item title is required\n";
            $valid = 0;
        }
        if(strlen($description) < 1){
            $failure .= "Item description is required\n";
            $valid = 0;
        }

        //if all fields are valid, attempt to add the new item
        if($valid == 1){
            if($_POST['weeklyRepetition'] != ''){
                $repetitions = $_POST['weeklyRepetition'];
                $frequency = $_POST['weeklyRepetitionFrequency'];
                $addition = (int)$frequency * 7;
                for($i=0; $i< $repetitions; $i++){
                    $stmt = $conn->prepare("INSERT INTO tbl_events (title, description, date, time, location, active) VALUES (?, ?, ?, ?, ?, ?)");
                    $repeatDate = new DateTime();
                    $repeatDate = date('Y-m-d', strtotime($date. ' + '. ($addition*$i). ' days'));
                    $stmt->bind_param("ssssss", $title, $description, $repeatDate, $time, $location, $active);
                    if($stmt->execute()){
                        $_SESSION['add'] = "Item Addition of $title Successful, $repeatDate was selected";
                        $stmt->close();
                    }
                    else{
                        $_SESSION['add'] = "Item Addition of $title Failed\n
                        $title $description $date $time $location $active\n";
                        $stmt->close();
                    }
                }
                header('Location:'.HOMEPAGE.'/admin/manage-events.php');
            }else if(isset($_POST['monthlyRepetition'])){
                $repetitions = $_POST['monthlyRepetition'];
                $day = date('d', strtotime($date));
                $month = date('m', strtotime($date));
                $year = date('y', strtotime($date));
                for($i=0; $i< $repetitions; $i++){
                    $stmt = $conn->prepare("INSERT INTO tbl_events (title, description, date, time, location, active) VALUES (?, ?, ?, ?, ?, ?)");
                    $repeatDate = new DateTime();
                    $year = ($month == 12) ? $year + 1 : $year;
                    $month = ($month == 12) ? 1 : $month + 1;
                    $repeatDate = date('Y-m-d', strtotime($year . '-' . $month . '-' . $day));
                    $_SESSION['add'] = "Repeat Date: $repeatDate";
                    $stmt->bind_param("ssssss", $title, $description, $repeatDate, $time, $location, $active);
                    if($stmt->execute()){
                        $_SESSION['add'] = "Item Addition of $title Successful, $repeatDate was selected";
                        $stmt->close();
                    }
                    else{
                        $_SESSION['add'] = "Item Addition of $title Failed\n
                        $title $description $repeatDate $time $location $active\n";
                        $stmt->close();
                    }
                }
                header('Location:'.HOMEPAGE.'/admin/manage-events.php');
            }else{
                $stmt->bind_param("ssssss", $title, $description, $date, $time, $location, $active);
                if($stmt->execute()){
                        $_SESSION['add'] = "Item Addition of $title Successful, $selected was selected";
                        $stmt->close();
                        header('Location:'.HOMEPAGE.'/admin/manage-events.php');
                    }
                else{
                    $_SESSION['add'] = "Item Addition of $title Failed\n
                    $title $description $date $time $location $active\n";
                    $stmt->close();
                    header('Location:'.HOMEPAGE.'/admin/manage-events.php');
                }
            }
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }
        }else{
            $_SESSION['add'] = "Item Addition Failed";
            $stmt->close();
            header('Location:'.HOMEPAGE.'/admin/manage-events.php');
        }
    }
?>