<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=2;
	
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
                        <h1>Who and What Are We</h1>
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
                    Wage Theft Definition.
                </p>
            </div>
            <div>
                <p>
                    Our goal:
                    Eliminate wage theft through the collection and anylization of real world wage data.
                </p>
            </div>
			<div>
                <p>
                    contact us:
                    cmcgillin@uiowa.edu
					rtran@uiowa.edu
					(for quickest response please provide us as many details as possible with any questions)
                </p>
            </div>
         
<?php
	include_once("footer.php");
?>


