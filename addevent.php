<?php
include '../connection.php';

	session_start();
	$newevent = $_POST['event'];
	$starttime = $_POST['start'];
	$endtime = $_POST['end'];

	if(isset($_SESSION['userid'])) {
		echo $_SESSION['userid'];
	}
?>
