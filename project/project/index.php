<?php
	include_once("config.php");

	$menu=0;
	$title ="AntiWageTheft.org";
	session_start();
	
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


	<div class="row">
		<!-- Content -->
		<div class="col-sm-9 col-xs-12">
			<p>
				AntiWageTheft
			</p>
			<img src="stopwagetheft.png" class="img-responsive" alt="AntiWageTheft"/>
		</div>
	
		<!-- Sidebar -->
		<div class="col-sm-3 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Wage Theft Stats
				</div>
				<div class="panel-body">
					stats
				</div>
			</div>
		</div>
	</div>

<?php
	include_once("footer.php");
?>
