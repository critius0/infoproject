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
    
	if (!$username) {
        echo "Hey, you didn't add a username. Please <a href='register.php'>try again</a>";
        exit;
    }
    // check that we have a first name
    if (!$firstname) {
        echo "Hey, you didn't add a first name. Please <a href='register.php'>try again</a>";
        exit;
    }
    
    // check that we have a last name
    if (!$lastname) {
        echo "Hey, you didn't add a last name. Please <a href='register.php'>try again</a>";
        exit;
    }

    // check that we have an email
    if (!$email) {
        echo "Hey, you didn't add an email. Please <a href='register.php'>try again</a>";
        exit;
    }
    
        // check that we have an email
    if (!$password) {
        echo "No password received. Please <a href='register.php'>try again</a>";
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
            reportErrorAndDie("The  username " . $username . " is already taken." .
                              "<p>Please <a href='register.php'>try again</a>");
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
        $mailcontent = "You should visit http://webdev.divms.uiowa.edu/~cmcgillin";
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