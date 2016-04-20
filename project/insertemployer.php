<html>

<head>
    <title>Insert Employer</title>
</head>

<body>

<h1>
    Employer insert feedback:
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
	$employername = $_POST['employername'];
    $employeraddress = $_POST['employeraddress'];
    $employercity = $_POST['employercity'];
	$employerstate = $_POST['employerstate'];
  
    //check that an employer was inserted
	if (!$employername) {
        $msg = "<p>Hey, you didn't insert an employer name.</p>";
				header("Location:addemployer.php?msg=$msg");
				exit;
    }
    // check that we have an address
    if (!$employeraddress) {
        $msg = "<p>Hey, you didn't insert an employer address.</p>";
				header("Location:addemployer.php?msg=$msg");
				exit;
    }
    
    // check that we have a city  
    if (!$employercity) {
        $msg = "<p>Hey, you didn't insert an employer city.</p>";
				header("Location:addemployer.php?msg=$msg");
				exit;
    }
	 // check that we have a state  
    if (!$employerstate) {
        $msg = "<p>Hey, you didn't insert an employer state.</p>";
				header("Location:addemployer.php?msg=$msg");
				exit;
    }

    
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
  
    
    // prepare sql statement for entering job info into Jobinfo table
    $query = "insert into Employer (employername, employeraddress, employercity, employerstate)
        values ('" . $employername . "', '" . $employeraddress . "', '" . $employercity . "', '" . $employerstate . "');";
    
    // execute sql statement and add job
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        header("Location: " . $baseURL . "addjob.php");
        
       
    } else {
       
        echo "<p>There was an error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='addjob.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>