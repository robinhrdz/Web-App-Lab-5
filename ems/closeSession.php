<?php
// Start a PHP session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: /ems/login.php");
exit();
?>