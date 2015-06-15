<?php
	include '../connection.php';
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	/* check that register form is filled */
	if($fname != null && $lname != null && $email != null && $pass != null && $cpass != null) {
		/* check that passwords match */
		if($pass == $cpass) {
			/* check that password is 8 characters long */
			if(strlen($pass) >= 8) {
				/* hash password for security */
				$hash = crypt($pass);
				$query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$hash')";
				mysqli_query($con, $query);
			} else {
				echo "Password must be 8 characters long!";
			}
		} else {
			echo "Passwords do not match!";
		}
	} else {
		echo "Please fill out form completely!";
	}
?>
