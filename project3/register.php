<?php
	include_once("config.php");
	$title ="AntiWageTheft.org";
	$menu=5;
	include_once("header.php");
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
            <!-- Header -->
            <h1>Registration Page</h1>
        </div>
		<h2>Please signup for an AntiWageTheft.org account:</h2>
		<p></p>
		<p>Already have an account? <a href="login.php">Login Here</a><p>
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
	<div class="form-group">
        <label for="confirmpassword">confirm password</label>
        <input type="password" class="form-control" name="confirmpassword" id="password"/>
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



<script>
    
    // confirm that a user wants to delete, then call php script to do deletion
    function deleteRecord(id, name) {
        // delete record from people table identified by id, if user agrees
        var decision = confirm("Would you like to delete " + name + "?");
        if (decision == true) {
            var xmlhttp = new XMLHttpRequest();
            
            // this part of code receives a response from deleteperson.php 
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    if(xmlhttp.responseText == "Person deleted") {
                        location.reload();
                    } else {
                        alert("Unsuccessful delete: " + xmlhttp.responseText);
                    }
                }
            }
            
            // this sends the data request to deleteperson.php
            xmlhttp.open("POST", "deleteperson.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("id=" + id);
        }
    }
    
    // pop up a form to edit a record that provides option to cancel or save changes
    function editRecord(id, firstname, lastname, email) {
        document.getElementById("editfirstname").value = firstname;
        document.getElementById("editlastname").value = lastname;
        document.getElementById("editemail").value = email;
        document.getElementById("editid").value = id;
        $("#dialog-form").dialog("open");        
    }
    
    $("#dialog-form").dialog(
        {
            autoOpen: false,
            height: 400,
            width: 400,
            modal: true,
            buttons: {
                "Save": function() {
                    var xmlhttp = new XMLHttpRequest();
            
                    // this part of code receives a response from editperson.php 
                    xmlhttp.onreadystatechange=function() {
                        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            if(xmlhttp.responseText == "Person edited") {
                                location.reload();
                            } else {
                                alert("Unsuccessful save: " + xmlhttp.responseText);
                                location.reload();
                            }
                        }
                    }
                                      
                    // this sends the data request to deleteperson.php
                    xmlhttp.open("POST", "editperson.php", true);
                    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    
                    // get variables
                    var editfirstname = document.getElementById("editfirstname").value;
                    var editlastname = document.getElementById("editlastname").value;
                    var editemail = document.getElementById("editemail").value;
                    var editid = document.getElementById("editid").value;
                    var editpassword = document.getElementById("editpassword").value;
                    
                    // send data to editperson.php
                    xmlhttp.send("id=" + editid + "&firstname=" + editfirstname + "&lastname=" + editlastname + "&email=" + editemail + "&password=" + editpassword);
                },
                "Cancel": function() {
                    $(this).dialog("close");       
                }
            }
        }
                             
                             )
    
    
</script>

</html>