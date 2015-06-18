<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>Change Password</title>
	</head>
	<body>
		<form id="changepass" action="changepass.php" method="post">
			<input placeholder="Email" type="email" name="email" /><br>
			<input placeholder="New Password" type="password" name="pass" /><br>
			<input placeholder="Confirm New Password" type="password" name="cpass" /><br>
			<input type="Submit" value="Change" />
		</form>		

<?php
	include '../connection.php';

	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];

	$query = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_row($result);

	if($row == null) {
		echo "Enter correct email!";
	} else {
		if($pass != $cpass) {
			echo "Passwords do not match!";
		} else {
			/* hash new password */
			$hash = crypt($pass);
			$newquery = "UPDATE users SET password='$hash' WHERE email='$email'";
			mysqli_query($con, $newquery);
		}
	}
?>	
