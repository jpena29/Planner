<?php
	/* Connect to MySQL */
	$con = mysqli_connect("host", "user", "password", "name of database");

	// Check connection
	if(mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
