<?php 
    session_destroy(); //unsets all session variables, important for the logged in one
    header('location:'.HOMEPAGE.'/login.php');
?>