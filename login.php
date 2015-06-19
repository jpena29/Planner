<?php
	include '../connection.php';
	session_start();

	$email = $_POST['email'];
	$pass = $_POST['password'];

	/* check if email is in database */
	$query = "SELECT * FROM users WHERE email='$email'";

	$result = mysqli_query($con, $query);

	if($result == null) {
		echo "Incorrect email, if a new user please register!";
	} else {
		/* check if password is correct */
		$row = mysqli_fetch_array($result);
		
		if(strcmp($row['password'], crypt($pass, $row['password'])) == 0) {
			$_SESSION['userid'] = $row['userid'];
			header('Location: home.php');
		} else {
			echo "Incorrect password";
		}
	}
?>	
