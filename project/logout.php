<?php
    // unset server variable that says we are logged in and send user to login screen
    include_once("config.php");
    
    session_start();
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
	if (isset($_SESSION['userid'])) {
        unset($_SESSION['userid']);
    }
	if (isset($_SESSION['usertype'])) {
        unset($_SESSION['usertype']);
    }
    session_destroy(); 
    
    // redirect user to login page
    header("Location: " . $baseURL . "index.php");
?>