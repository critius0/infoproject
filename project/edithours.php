<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $hoursworked = $_POST['hoursworked'];
    $datereportedfor = $_POST['datereportedfor'];
	$reportingid = $_POST['reportingid'];
    

    // check that we have an hours
    if ($hoursworked) {
        echo "No hours received";
		exit;
    }
    
    // check that we have the date
    if (!$datereportedfor) {
       echo "No date received";
		exit;
    }

    // check that we have an id
    if (!$reportingid) {
      , echo "No id received";
		exit;
    }
    
    
    $date = $datereportedfor;
	$datereportedfor = date("Y-m-d", strtotime($date));
    // get a handle to the database
    $DB = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    $updateQuery = "UPDATE Hoursreported SET hoursworked=" . $hoursworked  . ", datereportedfor=" . "'" . $datereportedfor . "'"
        . "WHERE reportingid = " . $reportingid . ";";
    
    $result = $DB->query($updateQuery);
    
    if ($result) {
        echo "Hours edited";
    } else {
        echo "Something bad happened with the query. " . $DB->error . " This was the query: " . $updateQuery;    
    }
    
?>