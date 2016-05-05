<?php
    include_once("util.php");
    include_once("config.php");
	session_start();
    // get data from fields
    $employerid = $_POST['employerid'];

    // check that we have an id
    if (!$employerid) {
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