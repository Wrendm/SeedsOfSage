<?php
require_once __DIR__ . '/config/constants.php';
session_destroy(); //unsets all session variables, important for the logged in one
header('location:' . HOMEPAGE . 'admin/login.php');
