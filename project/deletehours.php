<?php
    include_once("util.php");
    include_once("config.php");
	session_start();
	
	//block deactivated accounts from viewing anything
	if ($_SESSION['usertype'] ==3){
					
					$msg = "<p>This account has been deactivated. To seek reactivation please contact an administrator. Via the AboutUs page.</p>";
				header("Location:login.php?msg=$msg");
				
				}

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