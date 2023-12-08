<?php
// Start the session
session_start();

// Check if the logout parameter is set in the URL
if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to login page
    header("location: sign.php");
    exit;
}
?>