<!--This is the primary header for all regular logged in users, includes the logout feature and dashboard connection for jobs -->
<?php

session_start();

?>
<head>
	<title>AntiWageTheft</title>
	
	
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
			<nav class="navbar navbar-default">
				<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li <?php if($menu == 0) { echo 'class="active"'; } ?>><a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a></li>
					<li <?php if($menu == 2) { echo 'class="active"'; } ?>><a href="about.php"><span class="glyphicon glyphicon-book"> AboutUs</span></a></li>
					<li <?php if($menu == 1) { echo 'class="active"'; } ?>><a href="usersplash.php">My Dashboard</a></li>
				
				</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="help.php"><span class="glyphicon glyphicon-question-sign"> Help</span></a></li>
					<li ><a href="logout.php"><span class="glyphicon glyphicon-user"> Logout</span></a></li>
					
				</ul>
				
			</nav>
		</div>
	</div>
	

	