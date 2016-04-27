<html>

<head>

    <title>Insert Hours</title>
</head>

<body>

<h1>
    Insert Hours for Job
</h1>

<?php
    include_once("util.php");
    include_once("config.php");
	 session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
    // get data from fields
	$hoursworked = $_POST['hoursworked'];
    $datereportedfor = $_POST['datereportedfor'];
    $jobid = $_POST['jobid'];
  
    //check that hours were entered
	if (!$hoursworked) {
        $msg = "<p>Hey, you didn't insert any hours.</p>";
				header("Location:userpage.php?msg=$msg");
				exit;
    }
    // check that a date was selected
    if (!$datereportedfor) {
        $msg = "<p>Hey, you didn't select a date.</p>";
				header("Location:userpage.php?msg=$msg");
				exit;
    }
	 // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    $query1 = "SELECT * FROM Hoursreported WHERE jobid=17 AND datereportedfor='2016-04-11';" ;
	 //execute query1
	 $result1 = $db->query($query1);
	if ($result1) {
		//needs javascript to alert user about potential isse of adding hours 


	}
    
   
    //convert date format for correct use with MariaDB
    $date = $datereportedfor;
	$datereportedfor = date("Y-m-d", strtotime($date));
	
   
	// get a handle to the database
    //$db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    // prepare sql statement for entering job info into Jobinfo table
    $query = "insert into Hoursreported (jobid, hoursworked, datereportedfor)
        values ('" . $jobid . "', '" . $hoursworked . "', '" . $datereportedfor . "');";
    
    // execute sql statement and add job
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        header("Location: " . $baseURL . "jobinfo.php");
        
       
    } else {
       
        echo "<p>There was an error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='usersplash.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>