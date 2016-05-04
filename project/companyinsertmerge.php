<html>

<head>
    <title>Insert Employer</title>
</head>

<body>



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
    $employerid2 = $_POST['employerid2'];
    ;
  
    //check that a company to merge
	if (!$employerid) {
        $msg = "<p>Hey, you didn't select a company to be merged.</p>";
				header("Location:mergecompanies.php?msg=$msg");
				exit;
    }
    // check that we have company to merge into 
    if (!$employerid2) {
        $msg = "<p>Hey, you didn't insert a company to merge into.</p>";
				header("Location:mergecompanies.php?msg=$msg");
				exit;
    }
    
  

    
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
  
    
    // prepare sql statement for merging/updating employer table
    $query =  "UPDATE Jobinfo SET employerid= {$employerid2} WHERE employerid= {$employerid}";

    
    // execute sql statement to update/merge
    $result = $db->query($query);
    
    // check if merge worked
    if ($result) {
	//if merege now delete old company(succesful merge makes it so no employees connected with company being deleted
        $delete = "DELETE FROM Employer WHERE employerid= {$employerid}";
		$results= $db->query($delete);
		if ($results){
				$msg = "<p>Successful Merge.</p>";
				header("Location:mergecompanies.php?msg=$msg");
				exit;
				}
        
       
    } else {
       
        echo "<p>There was an error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='mergecompanies.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>