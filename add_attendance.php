<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Attendance</title>
	<link rel="stylesheet" href="Addons/attendance.css">
    <link rel="stylesheet" href="Addons/addattendance.css">
</head>
<body>
    <p class="patten">Add Attendance</p>
    <hr class="hratten">
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

		echo "<div class=\"table\"><table><tr><th>Name</th><th>Class-Div-Roll</th><th>MP</th><th>MP-T</th><th>CN</th><th>CN-T</th><th>AOS</th><th>AOS-T</th><th>DBMS</th><th>DBMS-T</th><th>TCS</th><th>TCS-T</th><th>Attended</th><th>Total</th><th>Percentage</th></tr>";

		while($row = mysqli_fetch_assoc($data)) {
			echo
                "<tr>
                <td>".$row["Fname"]." ".$row["Lname"]."</td>
                <td>".$row["Class"]." ".$row["Division"]." ".$row["RollNo"]."</td>
                <td><input type='number' name='EventId' placeholder='".$row["S1"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S1t"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S2"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S2t"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S3"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S3t"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S4"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S4t"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S5"]."'></td>
                <td><input type='number' name='EventId' placeholder='".$row["S5t"]." '></td>
                <td>".$row["Attended"]."</td>
                <td>".$row["Total"]."</td>
                <td>".$row["Percent"]."</td>
                </tr>";
		}
		echo "</table></div>";
	}
?>
</body>
</html>
