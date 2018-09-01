<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" href="Addons/update.css">
	<title>Edit Profile - Password</title>
</head>
<body>		
	
	<?php
		include 'session.php';
		echo"<h3>Change Password for ".$_SESSION['name']." </h3>";
	?>

	<div class="tags">
		<ul>
			<li>Old Password: </li>
			<li>New Password: </li>
		</ul>
	</div>
	
	<?php

		disp();

		function disp() {

			echo'<div class="container">
				<form action="home.php?page=new_pass.php&update=true" method="POST">
					<br><ul>
					<li><input type="password" name="Old" value=""><br></li>
					<li><input type="password" name="New" value=""><br></li>
					<li><input type="submit" value="Update"></li>
				</form> 
				<a href="home.php?page=update.php" value="Back">Go Back</a>
			</div>';
		}

		if (isset($_GET['update'])) {validate();}

		function validate()
		{
			$old = $_POST['Old'];
			$new = $_POST['New'];
			
			if ($old=="" || $new=="") {
				echo"<div class=\"container\"><p>Enter all details.</p></div>";
			}

			else {
				update($old, $new);
			}
		}

	
		function update($old, $new) {


			$user = 'student';
			$pass = 'sakec';
			$db = 'students';

			$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

			$check = "SELECT Pass FROM profile WHERE UserId=\"".$_SESSION['name']."\"";

			$data = mysqli_query($conn, $check) or die("No records found.");

			$row = mysqli_fetch_assoc($data);

			if ($old == $row['Pass']) {
				$sql = "UPDATE `profile` SET Pass=\"".$_POST['New']."\" WHERE UserId=\"".$_SESSION['name']."\"";

				if (mysqli_query($conn, $sql)) {
					echo "<div class=\"container\"><p>Password changed, redirecting to your profile...</p></div>";
				}
	
				else {
					echo "Error: ".mysqli_error($conn);
				}
				mysqli_close($conn);
				header("refresh:3; url=http://localhost/Git/college-system/home.php?page=update.php");
			}
			
			else {
				echo "<div class=\"container\"><p>Wrong Password</p></div>";
			}
		}
		
	?>

</body>
</html>