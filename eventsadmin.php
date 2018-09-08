<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Details</title>
	<link rel="stylesheet" href="Addons/attendance.css">
    
</head>
<body>		

    <?php
		if ($_SESSION['type']!="admin") {	
			exit("Not enough privilege.");
		}
	?>
	<p class="patten">Add Details</p>
	<div class="form">
        <div class="formsticky">
		<form action="" method="POST">
			<br>
			<input type="number" name="id" placeholder="eventid">
			<input type="date" name="date" placeholder="date">
			<input type="time" name="time" placeholder="time">
			<input type="number" name="venue" placeholder="venue">
			<input type="text" name="event_name" placeholder="eventname">
			<input type="submit" name="confirm" id="confirm" value="Add Values!">
		</form> 
        </div>

		<?php

			if (isset($_POST['confirm'])) {add();}
			
			function add() {

				$user = 'teacher';
				$pass = 'root';
				$db = 'students';

				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

				$sql = "INSERT INTO `events`(`id`, `date`, `time`, `venue`, `event_name`) VALUES (\"".$_POST['id']."\",\"".$_POST['date']."\",\"".$_POST['time']."\",".$_POST['venue'].",\"".$_POST['event_name']."\")";

				if (mysqli_query($conn, $sql)) {
					echo "Added details, refreshing data...";
				}
				else {
					echo "Error: ".mysqli_error($conn);
				}

				mysqli_close($conn);

				header("url=http://localhost/college-system/home.php?eventsadmin.php");
			}
				
		?>
	   </div>
    	<p class="patten">Event List</p>
        <hr class="hratten">
	   <?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);
        
        $date=date("Y-m-d");
		$fetch = 'select * from events where date>="'.$date.'" order by date';

		$temp = mysqli_query($conn, $fetch) or die("Record not found.");

        echo "<div class=\"table\"><table><tr><th>Event Id</th><th>Date</th><th>Time</th><th>venue</th><th>Event Name</th>";
		while($row = mysqli_fetch_assoc($temp)) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["venue"]."</td><td><a style=\"text-decoration:none;\" href='#' target='_blank'>".$row["event_name"]."</td></tr>";
		}
        echo "</table></div>"; 

		mysqli_close($conn);
	?>