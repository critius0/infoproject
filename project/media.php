<?php
	include_once("config.php");
	$title ="Media";
	$menu=1;
	include_once("header.php");
?>

	<div class="row">
		<!-- Content -->
		
                <div class="col-sm-9 col-xs-12">
                    <P>A star wars video:</P>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sGbxmsDFVnE" frameborder="0" allowfullscreen></iframe>  
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current interests:
                        </div>
                        <div class="panel-body">
                            Rewatching the old star wars.
                        </div>
                    </div> 
                </div>
            
            
            <div>
                <p><br>
                   A paragraph.  Star wars was alright.  The hype was over the top.  Movie just alright.  Excited for next one.
                </p>
	</div>


<?php
	include_once("footer.php");
?>