<?php
    include_once("util.php");
    include_once("config.php");

    // get data from fields
    $username = $_POST['username'];
    $password = $_POST['password'];
	
    
    // check that we have an username
    if (!$username) {
        $msg = "<p>Hey, you didn't enter a username.</p>";
		header("Location:login.php?msg=$msg");
		exit;
        
    }
    
        // check that we have an password
    if (!$password) {
        $msg = "<p>Hey, you didn't enter a password.</p>";
		header("Location:login.php?msg=$msg");
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
				
                header("Location: " . $baseURL . "usersplash.php");
            } else {
                // wrong password
                $msg = "<p>Incorrect Password.</p>";
				header("Location:login.php?msg=$msg");
				exit;
            }
        } else {
            $msg = "<p>Username/Password Combination not found.</p>";
				header("Location:login.php?msg=$msg");
        }
    } else {
        reportErrorAndDie("Could not run authorization.<p>" . $db->error, $query);
    }
    
?>