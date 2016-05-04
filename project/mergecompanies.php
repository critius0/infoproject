<?php
	include_once("config.php");
	include_once("util.php");
	$title ="AntiWageTheft.org";
	$menu=1;
	    session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	//block non admins from this page	
if (($_SESSION['usertype']) == 0){
	$msg = "<p>Page attempted to access requires an admin login.</p>";
				header("Location:login.php?msg=$msg");
	 
	}
	
	include_once("header3.php");
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
    <title>Merge Companies</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   

    <!-- Bootstrap Core CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../startbootstrap-sb-admin-2-1.0.8/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Calendar Jquery Plugin -->
	<link href="../Responsive-Event-Calendar-Date-Picker-jQuery-Plugin-Monthly/css/monthly.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="../Responsive-Event-Calendar-Date-Picker-jQuery-Plugin-Monthly/js/monthly.js"></script>
	
	<!-- Bower Timepicker Plugin -->
	<link type="text/css" href="../bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
	<script type="text/javascript" src="../bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<link type="text/css" href="../bootstrap-timepicker/css/bootstrap-timepicker.css" />
	
	<script type="text/javascript" src="../bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   

    
    
</head>

<body>
    
 <div id="wrapper">

        <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="admindash.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="companyoverview.php"><i class="fa fa-table fa-fw"></i> Company Overviews</a>
                        </li>
						<li>
                            <a href="companylookup.php"><i class="fa fa-building fa-fw"></i> Company Lookup</a>
                        </li>
						<li>
                            <a href="employeelookup.php"><i class="fa fa-male fa-fw"></i> Employee Lookup</a>
                        </li>
						<li>
                            <a href="viewcaselog.php"><i class="fa fa-briefcase fa-fw"></i> Case Log</a>
                        </li>
						<li>
                            <a href="addaccounts.php"><i class="fa fa-plus-circle fa-fw"></i> Manage Users</a>
                        </li>
						<li>
                            <a href="managecompanies.php"><i class="fa fa-plus-circle fa-fw"></i> Manage Companies</a>
                        </li>
              
                    </ul>
                </div>

            
            <!-- /.navbar-static-side -->
        </nav>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header">
					<h1 class="text-primary">Merge Companies</h1>
					</div>
				</div>
			<!-- Span for error messages -->	
				<span style="color:red; font-weight:bold">
					<?php if(isset($_GET['msg']))
						echo $_GET['msg'];
					?>
			</span>
                <!-- /.col-lg-12 -->
            
                <div class="col-sm-6">
					<form action="companyinsertmerge.php" method="post" enctype="multipart/form-data">
						<!-- employer options from above -->
						<div class="form-group">
							<label for="employerid">Company to be Merged</label>
							<select name="employerid">
							<?php echo $employerOptions; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="employerid2">Company Merging Into</label>
							<select name="employerid2">
							<?php echo $employerOptions; ?>
							</select>
						</div>
						
						
						
						<button type="submit" class="btn btn-default">Merge</button>
					</form>
				</div>
			</div>


</div> <!-- Closing container div -->

<!-- Code for editing form -->




</body>





</html>