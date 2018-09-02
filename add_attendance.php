<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Attendance</title>
	<link rel="stylesheet" href="Addons/profile.css">
</head>
<body>
	<?php
	fetch();
	function fetch() {
		
		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

		$get_all = "select * from profile order by Division, RollNo";
				
		$data = mysqli_query($conn, $get_all) or die("No records found.");

		$row = mysqli_fetch_assoc($data);

		echo "<div class=\"table\"><table><tr><th>Name</th><th>Class-Div-Roll</th><th>S1</th><th>S1t</th><th>S2</th><th>S2t</th><th>S3</th><th>S3t</th><th>S4</th><th>S4t</th><th>S5</th><th>S5t</th><th>Attended</th><th>Total</th><th>Percentage</th></tr>";

		while($row = mysqli_fetch_assoc($data)) {
			echo "<tr><td>".$row["Fname"]." ".$row["Lname"]."</td><td>".$row["Class"]." ".$row["Division"]." ".$row["RollNo"]."</td><td>".$row["S1"]."</td><td>".$row["S1t"]."</td><td>".$row["S2"]."</td><td>".$row["S2t"]."</td><td>".$row["S3"]."</td><td>".$row["S3t"]."</td><td>".$row["S4"]."</td><td>".$row["S4t"]."</td><td>".$row["S5"]."</td><td>".$row["S5t"]."</td><td>".$row["Attended"]."</td><td>".$row["Total"]."</td><td>".$row["Percent"]."</td></tr>";
		}
		echo "</table></div>";

		echo '<a href="home.php?page=attendance.php&totalupdate=true">Total+1</a>';
		mysqli_close($conn);
	}

	if (isset($_GET['totalupdate'])) {total();}

	function total()
	{
		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


		$sql = "UPDATE `profile` SET S1t=S1t+1";

		if (mysqli_query($conn, $sql)) {
		}
	
		else {
			echo "Error: ".mysqli_error($conn);
		}

		mysqli_close($conn);

		header('refresh:0, url=http://localhost/Git/college-system/home.php?page=attendance.php');
	}

	if (isset($_GET['update'])) {update();}
	
	function update() {

		$user = 'student';
		$pass = 'sakec';
		$db = 'students';

		$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


		$sql = "UPDATE `profile` SET MobNo=".$_POST['MobNo'].", Addr=\"".$_POST['Addr']."\" WHERE UserId=\"".$_SESSION['name']."\"";

		if (mysqli_query($conn, $sql)) {
			echo "Updated Profile, redirecting to home...";
		}
	
		else {
			echo "Error: ".mysqli_error($conn);
		}

		mysqli_close($conn);

		header("Location: home.php?page=update.php");
	}
?>
</body>
</html>
