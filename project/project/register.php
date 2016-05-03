<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=5;
	if (!isset($_SESSION['usertype'])) {
        // if not logged in show header with login feature
			include("header.php");
			
	} //determine to show header for an admin or regular user
	elseif (($_SESSION['usertype']) ==0){
		
		include("header2.php");

	}
	elseif (($_SESSION['usertype']) >0){
		include("header3.php");
	}
	
?>
<html>

<head>
    <title>Acount Registraion</title>

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
            <!-- Error report area -->
            <span style="color:red; font-weight:bold">
		<?php if(isset($_GET['msg']))
			echo $_GET['msg'];
		?>
		</span>
        </div>
		<h2>Please signup for an AntiWageTheft.org account:</h2>
		<p></p>
		<p>Already have an account? <a href="login.php">Login Here</a><p>
    </div>  
</div>

<div class="row">
<div class="col-xs-12">
<form action="insertperson.php" method="post" enctype="multipart/form-data">
    <!-- row open for username and email-->
		<div class="row">
			<div class="form-group col-xs-6">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username"/>
			</div>
			<div class="form-group col-xs-6">
				<label for="email">email</label>
				<input type="email" class="form-control" name="email"/>
			</div>
		</div> <!-- row close for username and email-->
		<!-- row open for first and last name -->
		<div class="row">
			<div class="form-group col-xs-6">
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" name="firstname"/>
			</div>
			
			<div class="form-group col-xs-6"> 
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" name="lastname"/>
			</div>
		</div> <!--row close for firs and last name -->
		
		<!--open row for password and confirm password -->
		<div class="row">
    
			<div class="form-group col-xs-6">
				<label for="password">password</label>
				<input type="password" class="form-control" name="password" id="password"/>
			</div>  
			
			<div class="form-group col-xs-6">
				<label for="confirmpassword">confirm password</label>
				<input type="password" class="form-control" name="confirmpassword" id="password"/>
			</div> 
		</div> <!-- close row for password and confirm password -->

    <button type="submit" class="btn btn-default">Create Account</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->



</div> <!-- Closing container div -->




</body>




</html>