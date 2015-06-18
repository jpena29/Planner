<?php
	include '../connection.php';
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	/* check that register form is filled */
	if($fname != null && $lname != null && $email != null && $pass != null && $cpass != null) {
		/* check if email is already in database */
		$query = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($con, $query);
		if($result == null) {
			/* check that passwords match */
			if($pass == $cpass) {
				/* check that password is 8 characters long */
				if(strlen($pass) >= 8) {
					/* hash password for security */
					$hash = crypt($pass);
					$query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$hash')";
					mysqli_query($con, $query);
					header('Location: home.php');
				} else {
					echo "Password must be 8 characters long!";
				}
			} else {
				echo "Passwords do not match!";
			}
		} else {
			echo "Email is already in used in our system! If you forgot your password <a href = 'changepass.php'>Click Here</a>";
		}
	} else {
		echo "Please fill out form completely!";
	}
?>
