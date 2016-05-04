<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=3;
	
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
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1>Help</h1>
                    </div>
                    
                    
                </div>
            </div>
           
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    <p>
                        AntiWageTheft.org<br>
                         <a href="https://en.wikipedia.org/wiki/Wage_theft" target="_blank">WageTheft</a> 
                    </p>
                    <img src="stopwagetheft.png" />
                </div>
               
            </div>
            <div>
                <p><br>
                    This page will be updated with helpful hints and contact information for support.
                </p>
            </div>
            
         
<?php
	include_once("footer.php");
?>


