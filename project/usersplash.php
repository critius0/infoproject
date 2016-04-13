<?php
	include_once("config.php");
	include_once("util.php");
	session_start();
	$title ="AntiWageTheft.org";
	$menu=1;
	include_once("header2.php");
	
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>    
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
    
</head>

<body>
    
<div class="container" style="width: 1024px">

<div class="row">
    <!--potential banner area or place to generate error notifications -->
</div>



<!---------------->
<!-- List Jobs  -->
<!---------------->
<p>
    <br/>
    <br/>
    <h2>Your Jobs:</h2>
</p>

<table class="table table-striped">
    
    <!-- Titles for table -->
    <tr>
        <td>jobid</td>
        <td>jobTitle</td>
		<td>userid</td>
        <td> </td>
        <td> </td>
    </tr>
 
<?php

    // get a handle to the database
  $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // prepare sql statement
	$query = "SELECT jobid ,Jobinfo.userid, Users.userid, employerid, jobTitle, username  FROM Jobinfo, Users WHERE Jobinfo.userid = Users.userid AND Users.userid = {$_SESSION[userid]};";    
    // execute sql statement
	$result = $db->query($query);
	
    
    // check if it worked
    if ($result) {
        $numberofrows = $result->num_rows;
        
        for($i=0; $i < $numberofrows; $i++) {
            $row = $result->fetch_assoc();
            echo "\n <tr>";
			echo "\n <td>" . $row['jobid'] . "</td>";
            echo "\n <td>" . $row['jobTitle'] . "</td>";
            echo "\n <td>" . $row['username'] . "</td>";
			$jobid = $row['jobid'];
			echo " <td><form action='userpage.php'  method='post'><input type='hidden' name='jobid' value={$jobid} />
                                    <input type= 'submit' value= 'Enter Info'/> </form></td>\n";
            echo "\n </tr>";
        }
        
    } else {
        reportErrorAndDie("Something went wrong when retrieving jobs from the database.<p>" .
                          "This was the error: " . $db->error . "<p>", $query);
    }
    
    $db->close();
    
?>    
  
</table>

</div> <!-- Closing container div -->
<div>
	<a href="addjob.php" class="btn btn-default">Add a Job</a>
</div>
	




</body>






</html>