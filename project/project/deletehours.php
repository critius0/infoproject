<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $reportingid = $_POST['reportingid'];

    // check that we have an id
    if (!$reportingid) {
        exit;
    }
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    $deleteQuery = "DELETE FROM Hoursreported WHERE reportingid = " . $reportingid . ";";
    
    $result = $db->query($deleteQuery);
    
     if ($result) {
        echo "Hours deleted";
        //header("Location: " . $baseURL . "input.php");
    } else {
        echo "soemthing bad happened with the query. " . $DB->error . " This was the query: " . $deleteQuery;    
    }
?>