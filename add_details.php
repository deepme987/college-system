<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Details</title>
</head>
<body>		
	<form action="add_details.php?add_value=true" method="POST">
			<br>
			<input type="text" name="UserId" placeholder="User id">
			<input type="text" name="Fname" placeholder="First Name">
			<input type="text" name="Lname" placeholder="Last Name">
			<input type="number" name="RegNo" placeholder="Registration No">
			<input type="text" name="Class" placeholder="Class">
			<input type="number" name="Division" placeholder="Division">
			<input type="number" name="RollNo" placeholder="Roll No">
			<input type="number" name="MobNo" placeholder="Mobile Number">
			<input type="text" name="Addr" placeholder="Address">
			
			<input type="submit" name="confirm" id="confirm" value="Add Values!">
		</form> 
		<?php

			if (isset($_GET['add_value'])) {add();}
			
			function add() {

				$user = 'teacher';
				$pass = 'root';
				$db = 'students';

				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

				$sql = "INSERT INTO `profile`(`UserId`, `Fname`, `Lname`, `RegNo`, `Class`, `Division`, `RollNo`, `MobNo`, `Addr`) VALUES (\"".$_POST['UserId']."\",\"".$_POST['Fname']."\",\"".$_POST['Lname']."\",".$_POST['RegNo'].",\"".$_POST['Class']."\",".$_POST['Division'].",".$_POST['RollNo'].",".$_POST['MobNo'].",\"".$_POST['Addr']."\")";

				if (mysqli_query($conn, $sql)) {
					echo "Added details.";
				}
				else {
					echo "Error: ".mysqli_error($conn);
				}

				mysqli_close($conn);
			}
			
		?>

</body>
</html>