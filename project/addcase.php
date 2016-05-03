<html>

<head>
    <title>Creation Feedback</title>
</head>

<body>

<h1>
    Case Creation feedback:
</h1>

<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
	$notes = $_POST['username'];
    $jobid = $_POST['firstname'];
    
    
	if (!$notes) {
        $msg = "<p>You didn't add notes for the moderator!.</p>";
				header("Location:caselog.php?msg=$msg");
				exit;
    }
    // check that we have a first name
    if (!$jobid) {
        $msg = "<p>Job not found!.</p>";
				header("Location:caselog.php?msg=$msg");
				exit;
    }
    
    
	}
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);

    
    // prepare sql statement
    $query = "insert into Caselog (jobid, notes)
        values ('" . $jobid . "', '" . $notes. "');";
    
    // execute sql statement
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        echo "Case created";
        echo "<p>";
        echo "<a href='caselog.php'>Return to caselog</a>";
        
    }
    
    $db->close();
?>

</body>

</html>