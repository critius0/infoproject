<html>

<head>
    <title>Enter Job Feedback</title>
</head>

<body>

<h1>
    Job/Employer registration feedback:
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
	$employerid = $_POST['employerid'];
    $jobTitle = $_POST['jobTitle'];
    $hourlyrate = $_POST['hourlyrate'];
  
    //check that an employer was selected
	if (!$employerid) {
        echo "Hey, you didn't select an Employer. Please <a href='addjob.php'>try again</a>";
        exit;
    }
    // check that we have a job title
    if (!$jobTitle) {
        echo "Hey, you didn't add a Job Title. Please <a href='addjob.php'>try again</a>";
        exit;
    }
    
    // check that we have a hourly rate 
    if (!$hourlyrate) {
        echo "Hey, you didn't input your hourly wage. Please <a href='addjob.php'>try again</a>";
        exit;
    }

    
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
  
    
    // prepare sql statement for entering job info into Jobinfo table
    $query = "insert into Jobinfo (userid, employerid, jobTitle, hourlyrate)
        values ('" . ($_SESSION['userid']) . "', '" . $employerid . "', '" . $jobTitle . "', '" . $hourlyrate . "');";
    
    // execute sql statement and add job
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        header("Location: " . $baseURL . "usersplash.php");
        
       
    } else {
       
        echo "<p>There was an error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='addjob.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>