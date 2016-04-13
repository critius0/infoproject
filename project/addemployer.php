<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=3;
	include_once("header2.php");
?>
<html>

<head>
    <title>Splash</title>

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
            <h1>antiwagetheft jobs</h1>
        </div>
		<h2>Add an Employer:</h2>
		<p></p>
		
    </div>  
</div>

<div class="row">
<div class="col-xs-12">
<form action="insertemployer.php" method="post" enctype="multipart/form-data">
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
        <input type="text" class="form-control" name="employerstate"/>
    </div>
    

    <button type="submit" class="btn btn-default">Add Employer</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->


<p>
  


</div> 



</body>





</html>