<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=3;
	include_once("header2.php");
	  session_start();
    if (!isset($_SESSION['username'])) {
        // if this variable is not set, then kick user back to login screen
        header("Location: " . $baseURL . "login.php");
    }
	//grab jobinfo for logged in user by session variable userid
	$db = connect($dbHost, $dbUser, $dbPassword, $dbName);
	$query = "SELECT jobid, jobTitle FROM Jobinfo, Users WHERE Jobinfo.userid = Users.userid='$_SESSION['userid']'"
	$result = $db->query($query);
	
	//check if results
	if
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
		<h2>Job(s) Being Tracked</h2>
		<p></p>
		
    </div>  
</div>

<div class="row">
<div class="col-xs-12">
<form action="insertperson.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username"/>
    </div>
	<div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname"/>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname"/>
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email"/>
    </div>
    
    <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" name="password" id="password"/>
    </div>  

    <button type="submit" class="btn btn-default">Create Account</button>
</form>
</div> <!-- close column -->
</div> <!-- close row -->

<!---------------->
<!-- List data  -->
<!---------------->
<p>
    <br/>
    <br/>
    <h2>Current User Info (modification options shown for testing purpose only)</h2>
</p>

<table class="table table-striped">
    
    <!-- Titles for table -->
    <tr>
        <td>Username</td>
        <td>First Name</td>
		<td>Last Name</td>
        <td>email</td>
        <td> </td>
        <td> </td>
    </tr>
    
<?php
    include_once("util.php");
    include_once("config.php");

    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // prepare sql statement
    $query = "select userid, username, firstname, lastname, email from Users order by lastname;";
    
    // execute sql statement
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        $numberofrows = $result->num_rows;
        
        for($i=0; $i < $numberofrows; $i++) {
            $row = $result->fetch_assoc();
            echo "\n <tr>";
			echo "\n <td>" . $row['username'] . "</td>";
            echo "\n <td>" . $row['firstname'] . "</td>";
            echo "\n <td>" . $row['lastname'] . "</td>";
            echo "\n <td>" . $row['email'] . "</td>";
            echo "\n <td><button type='button' onclick='deleteRecord(" . $row['id'] . ', "' .
                $row['firstname'] . " " . $row['lastname'] . '"' . ");'>Delete</button></td>";
            echo "\n <td><button type='button' onclick='editRecord(" . $row['id'] . ', "' .
                $row['firstname'] . '", "' . $row['lastname'] . '", "' . $row['email'] . '"' . ");'>Edit</button></td>";
            echo "\n </tr>";
        }
        
    } else {
        reportErrorAndDie("Something went wrong when retrieving people from the database.<p>" .
                          "This was the error: " . $db->error . "<p>", $query);
    }
    
    $db->close();
    
?>    
    
</table>

</div> <!-- Closing container div -->

<!-- Code for editing form -->
<div id="dialog-form" title="Edit person" style="display: none">
    <form>
      <fieldset>
        <div class="form-group">
            <label for="editfirstname">First Name</label>
            <input type="text" name="editfirstname" id="editfirstname" class="form-control" />
        </div>
    
        <div class="form-group">
            <label for="editlastname">Last Name</label>
            <input type="text" name="editlastname" id="editlastname" value="" class="form-control" />
        </div>
    
        <div class="form-group">
            <label for="editemail">Email</label>
            <input type="text" name="editemail" id="editemail" value="" class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="editpassword">Password</label>
            <input type="text" name="editpassword" id="editpassword" value="" class="form-control" />
        </div>

        <input type="hidden" name="editid" id="editid"/>
      </fieldset>
    </form>
</div>



</body>





</html>