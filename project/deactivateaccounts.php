<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $userid = $_POST['userid'];
	
	
    // check that we have an id
    if (!$userid) {
        echo "No id received";
		exit;
    }
	$savedType==$_SESSION['usertype'];
	
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
	elseif ($_SESSION['usertype'] < 3){
					
					$msg = "<p>This account has been deactivated. To seek reactivation please contact an administrator. Via the AboutUs page.</p>";
				header("Location:login.php?msg=$msg");
				exit;
				}
    
     // get a handle to the database
    $DB = connect($dbHost, $dbUser, $dbPassword, $dbName);
	
    $updateQuery = "UPDATE Users SET usertype=3 WHERE userid = " . $userid . ";";
    $_SESSION==$savedType['usertype'];
    $result = $DB->query($updateQuery);
    
    if ($result) {
        echo "Person deactivated";
    } else {
        echo "something bad happened with the query. " . $DB->error . " This was the query: " . $updateQuery;    
    }
?>