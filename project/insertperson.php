<html>

<head>
    <title>Registration Feedback</title>
</head>

<body>

<h1>
    Account registration feedback:
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
    
	if (!$username) {
        $msg = "<p>You didn't select a username.</p>";
				header("Location:register.php?msg=$msg");
				exit;
    }
    // check that we have a first name
    if (!$firstname) {
        $msg = "<p>You didn't enter your first name.</p>";
				header("Location:register.php?msg=$msg");
				exit;
    }
    
    // check that we have a last name
    if (!$lastname) {
        $msg = "<p>You didn't enter your last name.</p>";
				header("Location:register.php?msg=$msg");
				exit;
    }

    // check that we have an email
    if (!$email) {
        $msg = "<p>You didn't enter your an email address.</p>";
				header("Location:register.php?msg=$msg");
				exit;
    }
    
        // check that we have an password
    if (!$password) {
        $msg = "<p>You didn't enter password.</p>";
				header("Location:register.php?msg=$msg");
				exit;
	}
		
		//check that password matches confrimed password
	if ($password != $confirmpassword) {
		$msg = "<p>Passwords did not match.</p>";
				header("Location:register.php?msg=$msg");
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
				header("Location:register.php?msg=$msg");
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
    $query = "insert into Users (username, firstname, lastname, password, email)
        values ('" . $username . "', '" . $firstname . "', '" . $lastname . "', '" . $hashedPass . "', '" . $email  . "');";
    
    // execute sql statement
    $result = $db->query($query);
    
    // check if it worked
    if ($result) {
        echo $firstname . " " . $lastname . " Congrats on creating an account.  You can now login";
        echo "<p>";
        echo "<a href='login.php'>Login</a>";
        
        // inform new user that an account has been created for them
        $subject = "You have successfully created an account for the my antiwagetheft.org";
        $mailcontent = "Please login at http://webdev.divms.uiowa.edu/~cmcgillin/infoproject/project/login.php";
        mail($email, $subject, $mailcontent, "From: " . $adminEmail);
    } else {
        echo "Something went horribly wrong when adding " . $firstname . " " . $lastname . ".";
        echo "<p>This was the error: " . $db->error;
        echo "<p>This was the sql statement: " . $query;
        echo "<p>Please <a href='register.php'>try again</a>";
    }
    
    $db->close();
?>

</body>

</html>