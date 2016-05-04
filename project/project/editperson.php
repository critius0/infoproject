<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $userid = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // check that we have an id
    if (!$userid) {
        echo "No id received";
		exit;
    }
    
    // check that we have a first name
    if (!$firstname) {
        echo "No first name received";
		exit;
    }

    // check that we have a last name
    if (!$lastname) {
        echo "No last name received";
		exit;
    }
    
    // check that we have an email
    if (!$email) {
        echo "No email received";
		exit;
    }
    
    // get a handle to the database
    $DB = connect($dbHost, $dbUser, $dbPassword, $dbName);
	
  
    
    $updateQuery = "UPDATE Users SET firstname='" . $firstname . "', lastname='" . $lastname
        . "', email='" . $email . "' WHERE userid = " . $userid . ";";
    
    $result = $DB->query($updateQuery);
    
    if ($result) {
        echo "Person edited";
    } else {
        echo "soemthing bad happened with the query. " . $DB->error . " This was the query: " . $updateQuery;    
    }
    
?>