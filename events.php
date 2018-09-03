<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<title>Student List</title>
	<link rel="stylesheet" href="Addons/profile.css">
</head>
<body>
	<h2>Student List</h2>
	<?php

		$user = 'student';
		$pass = 'sakec';
		$db = 'events';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$fetch = "select * from details";

		$temp = mysqli_query($conn, $fetch) or die("Record not found.");

        echo "<div class=\"table\"><table><tr><th>First Name</th><th>Last Name</th><th>Class</th><th>Div</th><th>Roll No</th>";
		while($row = mysqli_fetch_assoc($temp)) {
			echo "<tr><td>".$row["id"]."</td><td>".$row["date"]."</td><td>".$row["venue"]."</td><td>".$row["time"]."</td><td>".$row["event_name"]."</td></tr>";
		}
        echo "</table></div>"; 

		mysqli_close($conn);
	?>
	
</body>
</html>