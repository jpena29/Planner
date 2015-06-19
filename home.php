<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<title>Schedule Planner</title>

		<!-- Stylesheets in use -->
		<link rel="stylesheet" type="text/css" href="home.css" />
		<link type="text/css" rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
			
		<!-- Script pages that are used -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<script src="moment/min/moment.min.js"></script>
		<script src="fullcalendar/fullcalendar.js"></script>
		<script type="text/javascript" src="home.js"></script>
	</head>
	<body>
		<div id="calendar"></div>
		<div id="logout"><a href="logout.php">Logout</a></div>
		<div id="event">
			<h2>Add New Event</h2>
			<form id="eventform" action="home.php" method="post">
				Event Name<input id="title" type="text" name="event" /><br>
				All day event?<input id="checkbox" type="checkbox" name="allday" /><br>	
				Start Time<input id="start" type="datetime-local" name="start" /><br>
				End Time<input id="endtime" type="datetime-local" name="end" /><br>
				<input type="submit" value="Add" />
			</form>
		</div>
		<?php
			/* add connection to mysql database */
			include '../connection.php';
			session_start();
			$newevent = $_POST['event'];
			$starttime = $_POST['start'];
			$endtime = $_POST['end'];
			$userid = $_SESSION['userid'];
			if(isset($_POST['allday'])) {
				/* check that event and start time field are not null */
				if($starttime != null && $newevent != null) {
					$query = "INSERT INTO events (userid, title, start) VALUES ('$userid', '$newevent', '$starttime')";
					$result = mysqli_query($con, $query);
					if(false == $result) {
						echo mysqli_error($con);
					} else {
						echo "done.";
						/* retrieve info to send to jquery */
						$query = "SELECT * FROM events WHERE userid='$userid' AND title='$newevent' AND start='$starttime'";
						$result = mysqli_query($con, $query);
						$row = mysqli_fetch_row($result);
					
						while($row = mysqli_fetch_row($result)) {
															
						}
					}
				}
			} else {
				/* check start time, end time, and event name */
				if($starttime != null && $endtime != null && $newevent != null) {
					$query = "INSERT INTO events (userid, title, start, end) VALUES ('$userid', '$newevent', '$starttime', '$endtime')";
					$result = mysqli_query($con, $query);
					if(false == $result) {
						echo mysqli_error($con);
					} else {
						echo "done.";
					}
				}
			}
		?>
	</body>
</html>
