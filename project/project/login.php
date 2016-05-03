<!-- login dialog -->
<html>
<?php
	include_once("config.php");

	$menu=4;
	$title ="AntiWageTheft.org";
	session_start();
 if (!isset($_SESSION['username'])) {
        include_once("header.php");
    }
else{
	include_once("header2.php");
	}
?>
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
    <div class="col-xs-12">
        <div>
		<span style="color:red; font-weight:bold">
		<?php if(isset($_GET['msg']))
			echo $_GET['msg'];
		?>
		</span>
            <!-- Header -->
			<p><h2>Please Login</h2></p>
			<p></p>
            <p>If you do not already have an acount you can create one <a href="register.php">here </a>
        </div>
    </div>  
</div>

<div class="row">
<div class="col-xs-6">
<form action="loginprocess.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="email">username:</label>
        <input type="text" class="form-control" name="username"/>
		
    </div>
    
    <div class="form-group">
        <label for="password">password:</label>
        <input type="password" class="form-control" name="password" id="password"/>
		
    </div>  

    <button type="submit" class="btn btn-default">Login</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->
</div> <!-- container -->

</body>
</html>