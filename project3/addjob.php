<?php
	include_once("config.php");
	include_once("util.php");
	    session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	$title ="AntiWageTheft.org";
	$menu=3;
	include_once("header2.php");
	    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // prepare sql statement to build current employer options list
    $query = "SELECT employerid, employername FROM Employer ORDER BY employername;";
    
    // execute sql statement
    $result = $db->query($query);
    //list for employer options
	$employerOptions = "";
	
    // check if it worked and add to employer options
    if ($result) {
        $numberofrows = $result->num_rows;
        
        for($i=0; $i < $numberofrows; $i++) {
            $row = $result->fetch_assoc();
			$employerOptions = $employerOptions . "\t\t\t";
			$employerOptions = $employerOptions . "<option value='";
			$employerOptions = $employerOptions . $row['employerid'];
			$employerOptions = $employerOptions . "'>" . $row['employername'] . "</option>";
			$employerOptions = $employerOptions . "\n";
		}
	} else {
		echo "There was a problem retrieving employers. " . $db->error;
		die();
	
	}
	$db->close();
?>
<html>

<head>
    <title>Add a Job</title>

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
    <div class="col-xs-12">
        <div class="page-header">
            <!-- Header -->
        
        </div>
		<h2>Add A Job to Your Profile:</h2>
		<p></p>
		<p></p>
		
    </div>  
</div>
<!-- create form for selecting employer and adding job, if employer not listed provide button to add a new employer -->
<div class="row">
<div class="col-xs-12">
<form action="insertjob.php" method="post" enctype="multipart/form-data">
    <!-- employer options from above -->
	<div class="form-group">
		<label for="employer">Employer</label>
		<select name="employerid">
		<?php echo $employerOptions; ?>
		</select>
	</div>
	 
	 <a href="addemployer.php" class="button">Add a new employer</a>
	 
	<div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input type="text" class="form-control" name="jobTitle"/>
    </div>
	<div class="form-group">
        <label for="houlyrate">Hourly Pay Rate</label>
        <input type="int" class="form-control" name="hourlyrate"/>
    </div>
	
    
    <button type="submit" class="btn btn-default">Add Job</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->

   
    
</table>

</div> <!-- Closing container div -->

<!-- Code for editing form -->




</body>





</html>