<!--This is the primary header for all regular logged in users, includes the logout feature and dashboard connection for jobs -->
<?php

session_start();

?>
<head>
	<title>AntiWageTheft</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>

	<!-- Header -->
	<div class="container">
	<div class="row">
		<div class="page-header">
				<div align="left"><h1><?php echo $title; ?></h1>
		
				<div align="right"><h1>Welcome <?php echo ($_SESSION['username']); ?>!</h1></div>
				
			</div>
		</div>
	</div>
	
	
	<!-- Menu bar -->
	<div class="row">
		<div class="col-xs-12">
			<div class="navbar navbar-inverse">
				<ul class="nav nav-pills navbar-left">
					<li <?php if($menu == 0) { echo 'class="active"'; } ?>><a href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
					<li <?php if($menu == 2) { echo 'class="active"'; } ?>><a href="about.php"><span class="glyphicon glyphicon-book"> AboutUs</span></a></li>
					<li <?php if($menu == 1) { echo 'class="active"'; } ?>><a href="usersplash.php">My Dashboard</a></li>
				
				</ul>
				
				<ul class="nav nav-pills navbar-right">
					<li <?php if($menu == 3) { echo 'class="active"'; } ?>><a href="help.php"><span class="glyphicon glyphicon-question-sign"> Help</span></a></li>
					<li <?php if($menu == 4) { echo 'class="active"'; } ?>><a href="logout.php"><span class="glyphicon glyphicon-user"> Logout</span></a></li>
					
				</ul>
				
			</div>
		</div>
	</div>
	