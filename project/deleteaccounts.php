<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $userid = $_POST['userid'];

    // check that we have an id
    if (!$userid) {
        exit;
    }
	if (!isset($_SESSION['usertype'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	//block non admins from this page	
	if (($_SESSION['usertype']) == 0){
		$msg = "<p>Page attempted to access requires an admin login.</p>";
				header("Location:login.php?msg=$msg");
	 
	}
	//block deactivated accounts from viewing anything
	elseif ($_SESSION['usertype'] ==3){
					
					$msg = "<p>This account has been deactivated. To seek reactivation please contact an administrator. Via the AboutUs page.</p>";
				header("Location:login.php?msg=$msg");
				exit;
				}
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
	$getinfo = "SELECT jobid FROM Jobinfo WHERE userid= " . $userid . ";"
	$results = $db->query($getinfo);
	if ($results) {
							$numberofrows = $result->num_rows;
							
							for($i=0; $i < $numberofrows; $i++) {
								$row = $result->fetch_assoc();
								$job = $row['jobid'];
								$predelete = "DELETE FROM Hoursreported WHERE jobid= " . $job . ";"
								$db->query($predelete);
								$predelete2 = "DELETE FROM Paycheck WHERE jobid= " . $job . ";"
								$db->query($predelete2);
								$predelete3 = "DELETE FROM Caselog WHERE jobid= " . $job . ";"
								$db->query($predelete3);
								$predelete4 = "DELETE FROM Jobinfo WHERE jobid= " . $job . ";"
								$db->query($predelete4);
								
							}
	}
	else {
		echo "something did not work, sorry";
	}
    $deleteQuery = "DELETE FROM Users WHERE userid = " . $userid . ";"
   
    $result = $db->query($deleteQuery);
    
     if ($result) {
        echo "Person deleted";
        //header("Location: " . $baseURL . "input.php");
    } else {
        echo "soemthing bad happened with the query. " . $DB->error . " This was the query: " . $deleteQuery;    
    }
?>