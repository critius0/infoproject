<?php
	include_once("config.php");
	include_once("util.php");
	$title ="AntiWageTheft.org";
	session_start();
		
	$menu=1;
	include_once("header2.php");
	
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	if (isset($_SESSION['jobid'])) {
        unset($_SESSION['jobid']);
    }
	

?>
<html>

<head >
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

    <!-- jQuery stuff -->
	<script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>   
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
	<!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

</head>


    
<!-- <div class="container" style="width: 1024px">

<div class="row">
    <!--potential banner area or place to generate error notifications 
</div> -->
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="userpage.php">User Page</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Time</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
						
                        <li>
							<a href="usersplash.php"><i class="fa fa-user fa-fw"></i> My Jobs</a>
                        </li>
						<li>
                            <a href="companyoverview2.php"><i class="fa fa-bar-chart fa-fw"></i>Company Lookups</a>
                        </li>
						<li>
                            <a href="caselog.php"><i class="fa fa-sign-out fa-fw"></i>My CaseLogs</a>
                        </li>
              
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<!-- jobs form -->
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
					<h1 class="text-primary">Potential Cases</h1>
					</div>
				</div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
						<!-- Titles for table -->
						<tr>
							<!-- <td>jobid</td> -->
							<th>Job Title</th>
							<th>Paycheck Period Start</th>
							<th>Paycheck Period End</th>
							<th>Amount Earned Reported</th>
							<th>Amount Expected</th>
							<td></td>
							<td> </td>
							<td> </td>
						</tr>
						<!---------------->
						<!-- List Jobs  -->
						<!---------------->
						<?php

							// get a handle to the database
						  $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
							
							// prepare sql statement
							$query = "SELECT jobTitle, Jobinfo.hourlyrate, Paycheck.payCheckPeriodStart, Paycheck.payCheckPeriodEnd, Paycheck.amountearned, Paycheck.hoursworked FROM Jobinfo, Users, Paycheck WHERE Paycheck.hoursworked*Jobinfo.hourlyrate>Paycheck.amountearned AND Jobinfo.userid = Users.userid AND Paycheck.jobid=Jobinfo.jobid AND Users.userid = {$_SESSION[userid]};";    
							// execute sql statement
							$result = $db->query($query);
							
							
							// check if it worked
							if ($result) {
								$numberofrows = $result->num_rows;
								
								for($i=0; $i < $numberofrows; $i++) {
									$row = $result->fetch_assoc();
									echo "\n <tr>";
									echo "\n <td>" . $row['jobTitle'] . "</td>";
									echo "\n <td>" . $row['payCheckPeriodStart'] . "</td>";
									echo "\n <td>" . $row['payCheckPeriodEnd'] . "</td>";
									echo "\n <td>" . $row['amountearned'] . "</td>";
									echo "\n <td>" . $row['hourlyrate'] * $row['hoursworked']. "</td>";
									echo "\n <td><button type='button' onclick='addRecord(" . $row['jobid'] . ");'>Create Case</button></td>";
									echo "\n </tr>";
								}
								
							} else {
								reportErrorAndDie("Something went wrong when retrieving jobs from the database.<p>" .
												  "This was the error: " . $db->error . "<p>", $query);
							}
							
							$db->close();
							
						?>    
  
					</table>
                <!-- /.col-lg-12 -->
				</div>
            <!-- /.row -->
			</div>
		</div>
		<!-- enter hours form -->


</div> <!-- Closing container div -->

</body>
				<!-- Code for adding form -->
					<div id="dialog-form" title="Create Case" style="display: none">
						<form>
						  <fieldset>
							<div class="form-group">
								<label for="hours worked">Add Notes for Review</label>
								<input type="text" name="addnotes" id="addnotes" class="form-control" placeholder="Include 1)Job Title and 2)Paycheck Start/End Dates" rows="4"/>
							</div>					
							<input type="hidden" name="addjobid" id="addjobid"/>
						  </fieldset>
						</form>
					</div>
<script>						
						
						// pop up a form to edit a record that provides option to cancel or save changes
						function addRecord(jobid, notes) {						
							document.getElementById("addjobid").value = jobid;
							$("#dialog-form").dialog("open");  
							$( "#resizable" ).resizable();
										
						}
						
						$("#dialog-form").dialog(
							{
								autoOpen: false,
								height: 215,
								width: 600,
								modal: true,
								buttons: {
									"Add": function() {
										var xmlhttp = new XMLHttpRequest();
								
										// this part of code receives a response from addcase.php 
										xmlhttp.onreadystatechange=function() {
											if (xmlhttp.readyState==4 && xmlhttp.status==200) {
												if(xmlhttp.responseText == "Case Added") {
													location.reload();
												} else {
													alert("Unsuccessful add: " + xmlhttp.responseText);
													location.reload();
												}
											}
										}
														  
										// this sends the data request to addcase.php
										xmlhttp.open("POST", "addcase.php", true);
										xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
										
										// get variables
										var addjobid = document.getElementById("addjobid").value;
										var addnotes = document.getElementById("addnotes").value;				
																
										// send data to addcase.php
										xmlhttp.send("&jobid=" + addjobid + "&notes=" + addnotes);
									},
									"Cancel": function() {
										alert("Unsuccessful add: " + "%jobid);
										$(this).dialog("close");       
									}
								}
							}
												 
											 )
						
						
					</script>

</html>