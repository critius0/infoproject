<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $employerid = $_POST['employerid'];

    // check that we have an id
    if (!$employerid) {
        exit;
    }
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
	
	}
    $deleteQuery = "DELETE FROM Employer WHERE employerid = " . $employerid . ";"
   
    $result = $db->query($deleteQuery);
    
     if ($result) {
        echo "company deleted";
        header("Location: " . $baseURL . "managecompanies.php");
    } else {
        echo "Unable to delete as their are still employees associated with this company.  Please delete employees or merge companies and retry. " . $DB->error . " This was the query: " . $deleteQuery;    
    }
?>