<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $userid = $_POST['userid'];

    // check that we have an id
    if (!$userid) {
        exit;
    }
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    $deleteQuery = "DELETE FROM Users WHERE userid = " . $userid . ";";
    
    $result = $db->query($deleteQuery);
    
     if ($result) {
        echo "Person deleted";
        //header("Location: " . $baseURL . "input.php");
    } else {
        echo "soemthing bad happened with the query. " . $DB->error . " This was the query: " . $deleteQuery;    
    }
?>