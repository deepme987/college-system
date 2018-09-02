<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DashBoard</title>
	<link rel="stylesheet" href="Addons/container.css">
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
		include 'session.php';	
		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$get_all = "select * from profile where UserId=\"".$_SESSION['name']."\"";
				
		$data = mysqli_query($conn, $get_all) or die("No records found.");

		$row = mysqli_fetch_assoc($data);

		echo'<div class="container">
				<br><ul>
				<li><span>'.$row["Fname"].' '.$row["Lname"].'</span><br></li>
				<li>'.$row["UserId"].'</li>
				<li><span>'.$row["Class"].' - '.$row["Division"].' - '.$row["RollNo"].'</span><br></li>
		</div>';

		mysqli_close($conn);
	?>
	
</body>
</html>