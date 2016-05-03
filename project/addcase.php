<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
	$notes = $_POST['notes'];
    $jobid = $_POST['jobid'];
    
    
	// check that we have notes
    if (!$notes) {
        echo "You didn't add notes for the case!";
		exit;
    }
    
    // check that we have a job
    if (!$jobid) {
       echo "No job found for case";
	   exit;
    }
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
   
    // prepare sql statement
    $query = "INSERT INTO Caselog (jobid, notes) values ('" . $jobid . "', '" . $notes. "');";
    
    // execute sql statement
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        echo "Case added";
    } else {
        echo "Something bad happened with the query. " . $DB->error . " This was the query: " . $query;     
	}
?>
	