<html>

<head>
    <title>Creation Feedback</title>
</head>

<body>

<h1>
    Account Creation feedback:
</h1>

<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
	$username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$usertype = (int)$_POST['usertype'];
    
	if (!$username) {
        $msg = "<p>You didn't select a username.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
    }
    // check that we have a first name
    if (!$firstname) {
        $msg = "<p>You didn't enter your first name.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
    }
    
    // check that we have a last name
    if (!$lastname) {
        $msg = "<p>You didn't enter your last name.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
    }

    // check that we have an email
    if (!$email) {
        $msg = "<p>You didn't enter your an email address.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
    }
    
        // check that we have an password
    if (!$password) {
        $msg = "<p>You didn't enter password.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
	}
		
		//check that password matches confrimed password
	if ($password != $confirmpassword) {
		$msg = "<p>Passwords did not match.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
		
	}
	
	   // check that we have a user type
    if ($usertype != '0' and $usertype != '1' and $usertype != '2') {
        $msg = "<p>You didn't choose a usertype.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
	}
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // check if username is already in the table
    $usernameCheckQuery = "select * from Users where username='" . $username . "'";
    $result = $db->query($usernameCheckQuery);
    if ($result) {
        $numberofrows = $result->num_rows;
        if ($numberofrows > 0) {
            $msg = "<p>The  username " . $username . " is already taken.</p>";
				header("Location:addaccounts.php?msg=$msg");
				exit;
        }
    } else {
        reportErrorAndDie("Could not check if username was already in table.<p>" . $db->error, $usernameCheckQuery);
    }

    // generate hashed password
    // for php 5.5 or greater use this:
    // $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    // it generates a secure salt automatically
    $hashedPass = crypt($password, getSalt());
    
    // prepare sql statement
    $query = "insert into Users (username, firstname, lastname, password, email, usertype)
        values ('" . $username . "', '" . $firstname . "', '" . $lastname . "', '" . $hashedPass . "', '" . $email  . "', '" . $usertype . "');";
    
    // execute sql statement
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        
		
        
        // inform new user that an account has been created for them
        $subject = "An account has successfully been created for you at antiwagetheft.org";
        $mailcontent = "Please login at http://webdev.divms.uiowa.edu/~cmcgillin/infoproject/project/login.php";
        mail($email, $subject, $mailcontent, "From: " . $adminEmail);
		$msg = "<p>Successfully created an acount with username: " . $username . " .</p>";
				header("Location:addaccounts.php?msg=$msg");
    } else {
        echo "Something went horribly wrong when adding " . $firstname . " " . $lastname . ".";
        echo "<p>This was the error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='addacount.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>