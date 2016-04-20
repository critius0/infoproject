<?php
	include_once("config.php");

	$menu=0;
	$title ="AntiWageTheft.org";
	session_start();
	
    if (!isset($_SESSION['username'])) {
        // if logged in show logout and user header
			include("header.php");
	}
	else{
		include("header2.php");
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
