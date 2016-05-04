<?php
    include_once("config.php");
    
    session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
?>

<html>
    <head>
        <title>Logged in</title>
    </head>
    <body>
        <p>
        Yes, you are logged in!
        </p>
        <p>Check out the song database: <a href="songinput.php">Songs </a>
        <p>
		<p>Add a New Artist to the database: <a href="inputart.php">Artists </a></p>
		<p></p>
        <p> Or: <a href="logout.php">Log Out</a>.
        </p>
    </body>
</html>