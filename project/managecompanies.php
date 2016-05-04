<?php
	
	include_once("util.php");
	include_once('config.php');
	$title ="AntiWageTheft.org";
$menu=1;
session_start();
 if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	include_once('header3.php');
	
	 
		
	    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // prepare sql statement to build current employer options list
    $query = "SELECT employerid, employername FROM Employer ORDER BY employername;";
    
    // execute sql statement
    $result = $db->query($query);
	$db->close();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Companies</title>

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

    
	<!-- following 3 scripts for table rendering -->
	<!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
	<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>


</head>

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
                <a class="navbar-brand" href="admindash.html">Manage Companies</a>
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
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		<!-- End of header -->
		
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
					<h1 class="text-primary">Add Employer</h1>
					</div>
				</div>
				<!-- span for form error messages -->
				<span style="color:red; font-weight:bold">
					<?php if(isset($_GET['msg']))
					echo $_GET['msg'];
					?>
				</span>
				
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
                <div class="col-lg-12">
					<form action="admininsertemployer.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="employername">Employer Name</label>
							<input type="text" class="form-control" name="employername"/>
						</div>
						<div class="form-group">
							<label for="employeraddress">Employer Address</label>
							<input type="text" class="form-control" name="employeraddress"/>
						</div>

						<div class="form-group">
							<label for="employercity">Employer City</label>
							<input type="text" class="form-control" name="employercity"/>
						</div>
						<div class="form-group">
							<label for="employerstate">Employer State</label>
							<select name="employerstate">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>
						</div>	
						<button type="submit" class="btn btn-default">Add Employer</button>
					</form>
				</div>
			
			
               
            </div>
			
				<div class="row">
                <div class="col-lg-12">
                    <table id="company" class="table table-striped" cellspacing="0" width="100%">
						<!-- Titles for table -->
						<thead>
						<tr>
							<th>Company ID</th> 
							<th>Companies Name</th>
							<th>Company Address</th>
							<th>Company City </th>
							<th>Company State </th>
							<th> </th>
							<th> </th>
							<th> </th>
						</tr>
						</thead>
						<tbody>
						<!---------------->
						<!-- List Jobs  -->
						<!---------------->
						<?php

							// get a handle to the database
						  $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
							
							// prepare sql statement
							$query = "SELECT employerid, employername, employeraddress, employercity, employerstate FROM Employer ORDER BY employername";    
							// execute sql statement
							$result = $db->query($query);
							
							
							// check if it worked
							if ($result) {
								$numberofrows = $result->num_rows;
								
								for($i=0; $i < $numberofrows; $i++) {
									$row = $result->fetch_assoc();
									echo "\n <tr>";
									echo "\n <td>" . $row['employerid'] . "</td>";
									$employerid = $row['employerid'];
									echo "\n <td>" . $row['employername'] . "</td>";
									$employername = $row['employername'];
									echo "\n <td>" . $row['employeraddress'] . "</td>";
									$employeraddress = $row['employeraddress'];
									echo "\n <td>" . $row['employercity'] . "</td>";
									$employercity = $row['employercity'];
									echo "\n <td>" . $row['employerstate'] . "</td>";
									$employerstate = $row['employerstate'];
									echo "\n <td><button type='button' onclick='deleteRecord(" . $row['employerid'] . ");'>Delete</button></td>";
									echo "\n <td><button type='button' onclick='editRecord(" . $row['employerid'] . ', "' .
									$row['firstname'] . '", "' . $row['lastname'] . '", "' . $row['email'] . '"' . ");'>Edit</button></td>";
									echo "\n <td><button type='button' onclick='mergeRecord(" . $row['employerid'] . ");'>Merge</button></td>";

									
									//echo " <td><form action='editcompany.php'  method='post'><input type='hidden' name='employerid' value={$employerid} />
														//	<input type= 'submit' value= 'Other Info'/> </form></td>\n"; */
									echo "\n </tr>";
								}
								
							} else {
								reportErrorAndDie("Something went wrong when retrieving jobs from the database.<p>" .
												  "This was the error: " . $db->error . "<p>", $query);
							}
							
							$db->close();
							
						?>    
						</tbody>
					</table>
                <!-- /.col-lg-12 -->
				</div>
			</div>
	</div>
	</div><!--wrapper-->
	
				<!-- Code for editing form -->
					<div id="dialog-form" title="Edit person" style="display: none">
						<form>
						  <fieldset>
							<div class="form-group">
								<label for="first name">First Name</label>
								<input type="text" name="editfirstname" id="editfirstname" class="form-control" />
							</div>
						
							<div class="form-group">
								<label for="last name">Last Name</label>
								<input type="text" name="editlastname" id="editlastname" value="" class="form-control" />
							</div>
						
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="editemail" id="editemail" value="" class="form-control" />
							</div>
							<input type="hidden" name="edituserid" id="edituserid"/>
						  </fieldset>
						</form>
					</div>
</body>
					<script>						
						// confirm that a user wants to delete, then call php script to do deletion
						function deleteRecord(employerid) {
							// delete record from people table identified by id, if user agrees
							var decision = confirm("Are you sure you want to delete " + employerid + "? this will remove the company from the database.");
							if (decision == true) {
								var xmlhttp = new XMLHttpRequest();
								
								// this part of code receives a response from deletecompany.php 
								xmlhttp.onreadystatechange=function() {
									if (xmlhttp.readyState==4 && xmlhttp.status==200) {
										if(xmlhttp.responseText == "company deleted") {
											location.reload();
										} else {
											alert("Unsuccessful delete: " + xmlhttp.responseText);
										}
									}
								}
								
								// this sends the data request to deleteaccounts.php
								xmlhttp.open("POST", "deletecompany.php", true);
								xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
								xmlhttp.send("employerid=" + employerid);
							}
						}
						
						// pop up a form to edit a record that provides option to cancel or save changes
						function editRecord(userid, firstname, lastname, email) {
							document.getElementById("editfirstname").value = firstname;
							document.getElementById("editlastname").value = lastname;
							document.getElementById("editemail").value = email;
							document.getElementById("edituserid").value = userid;
							$("#dialog-form").dialog("open");        
						}
						
						$("#dialog-form").dialog(
							{
								autoOpen: false,
								height: 400,
								width: 400,
								modal: true,
								buttons: {
									"Save": function() {
										var xmlhttp = new XMLHttpRequest();
								
										// this part of code receives a response from editperson.php 
										xmlhttp.onreadystatechange=function() {
											if (xmlhttp.readyState==4 && xmlhttp.status==200) {
												if(xmlhttp.responseText == "Person edited") {
													location.reload();
												} else {
													alert("Unsuccessful save: " + xmlhttp.responseText);
													location.reload();
												}
											}
										}
														  
										// this sends the data request to editperson.php
										xmlhttp.open("POST", "editperson.php", true);
										xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
										
										// get variables
										var editfirstname = document.getElementById("editfirstname").value;
										var editlastname = document.getElementById("editlastname").value;
										var editemail = document.getElementById("editemail").value;
										var edituserid = document.getElementById("edituserid").value;
										
										// send data to editperson.php
										xmlhttp.send("userid=" + edituserid + "&firstname=" + editfirstname + "&lastname=" + editlastname + "&email=" + editemail);
									},
									"Cancel": function() {
										$(this).dialog("close");       
									}
								}
							}
												 
											 )
						
						
					</script>
					<script>
<!-- script for table rendering -->
$(document).ready(function() {
    $('#company').DataTable();
} );
$('#company').dataTable( {
  "columnDefs": [ {
      "targets": [5,6,7],
      "orderable": false
    } ]
} );
</script>
</html>