<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $username = $_POST['username'];
    $password = $_POST['password'];
	
    
    // check that we have an email
    if (!$username) {
        echo "Hey, you didn't enter anything. Please <a href='login.php'>try again</a>";
        exit;
    }
    
        // check that we have an email
    if (!$password) {
        echo "No password received. Please <a href='login.php'>try again</a>";
		exit;
    }
    
    // get a handle to the database
    $db = connect($dbHost, $dbUser, $dbPassword, $dbName);
    
    // get hashed password based on email
    $query = "select password, userid, usertype  from Users where username='" . $username . "'";
    $result = $db->query($query);
    if ($result) {
        $numberofrows = $result->num_rows;
        $row = $result->fetch_assoc();
        if ($numberofrows > 0) {
            $hashedPass = $row['password'];
			$userid = $row['userid'];
			$usertype =$row['usertype'];
            
            // check if the password matches the hashed version in the database
            // for version 5.5 or later we would use
            // if (password_verify($password, $hashedPass)) {
            if ($hashedPass == crypt($password, $hashedPass)) {
                // we have verified the password
                session_start();
                $_SESSION['username'] = $username;
				$_SESSION['userid'] = $userid;
				$_SESSION['usertype'] = $usertype;
				
                header("Location: " . $baseURL . "addjob.php");
            } else {
                // wrong password
                reportErrorAndDie("Wrong password. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
            }
        } else {
            reportErrorAndDie("Username not in our system. <a href='login.php'>Try again</a>.<p>" . $db->error, $query);
        }
    } else {
        reportErrorAndDie("Could not run authorization.<p>" . $db->error, $query);
    }
    
?>