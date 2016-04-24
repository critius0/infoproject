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
    // get data from from paycheck.php entry form
	$paycheckhours = $_POST['paycheckhours'];
    $paycheckstartdate = $_POST['paycheckstartdate'];
	$paycheckenddate = $_POST['paycheckenddate'];
	$amountearned = $_POST['amountearned'];
    //need to correctly get jobid at the moment it is coming from userpage.php and from usersplash.php
	$jobid = $_POST['jobid'];
  
    //check that hours were entered
	if (!$paycheckhours) {
        echo "Hey, you didn't enter any hours. Please <a href='paycheck.php'>try again</a>";
        exit;
    }
    // check that a start and end dates were selected
    if (!$paycheckstartdate) {
        echo "Hey, you didn't select a start date. Please <a href='paycheck.php'>try again</a>";
        exit;
    }
	if (!$paycheckenddate) {
        echo "Hey, you didn't select an end date. Please <a href='paycheck.php'>try again</a>";
        exit;
    }
	//check that hours were entered.
	if (!$amountearned) {
        echo "Hey, you didn't insert amount earned. Please <a href='paycheck.php'>try again</a>";
        exit;
    }
	
	
    //convert date format for correct use with MariaDB
    $date1 = $paycheckstartdate;
	$paycheckstartdate = date("Y-m-d", strtotime($date1));
	$date2 = $paycheckenddate;
	$paycheckenddate = date("Y-m-d", strtotime($date2));

    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
  
    
    // prepare sql statement for entering job info into paycheck table
    $query = "insert into Paycheck (jobid, hoursworked, amountearned, payCheckPeriodStart, payCheckPeriodEnd)
        values ('" . {$_SESSION['jobid']} . "', '" . $hoursworked . "', '" . $amountearned . "', '" . $paycheckstartdate . "', '" . $paycheckenddate . "');";
    
    // execute sql statement and add job
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        header("Location: " . $baseURL . "userpage.php");
        
       
    } else {
       
        echo "<p>There was an error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='paycheck.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>