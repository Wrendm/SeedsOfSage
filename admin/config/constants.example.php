<?php
// Copy this file to constants.php and adjust the values for your setup.
// constants.php is gitignored so real credentials never get committed.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Base URL of the site, with a trailing slash. XAMPP serves plain http by default.
define('HOMEPAGE', 'http://localhost/SeedsOfSage/');


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Database connection (XAMPP defaults: user "root", empty password)
$conn = mysqli_connect('localhost', 'root', '')
    or die(mysqli_connect_error());
mysqli_select_db($conn, 'seedsofsage')
    or die(mysqli_error($conn));

// When true, the contact form does not call Web3Forms and no key is sent to the browser.
define('DEMO_MODE', true);

// Only used when DEMO_MODE is false. Get a key at web3forms.com.
define('CONTACT_API_KEY', 'YOUR_WEB3FORMS_KEY');
