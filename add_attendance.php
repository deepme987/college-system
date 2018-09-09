<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Attendance</title>
	<link rel="stylesheet" href="Addons/attendance.css">
    <link rel="stylesheet" href="Addons/addattendance.css">
</head>
<body>
    <div class="form">
        <div class="formsticky">
		<form action="" method="POST">
			<br>
			<input type="number" name="EventId" placeholder="eventid">
			<input type="date" name="date" placeholder="date">
			<input type="time" name="time" placeholder="time">
			<input type="text" name="venue" placeholder="venue">
			<input type="text" name="EventName" placeholder="eventname">
            <input type="text" name="link" placeholder="link">
			<input type="submit" name="confirm" id="confirm" value="Add event!">
		</form> 
        </div>
	<p class=patten>Attendance</p>
    <hr class="hratten">
    <?php
        if (isset($_POST['confirm'])) {add();}
			
        function add() {

				$user = 'teacher';
				$pass = 'root';
				$db = 'students';

				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);


				$sql = "INSERT INTO `events`(`id`, `date`, `time`, `venue`, `event_name`,`link`) VALUES (".$_POST['EventId'].",".$_POST['date'].",\"".$_POST['time'].":00\",\"".$_POST['venue']."\",\"".$_POST['EventName']."\",\"".$_POST['link  ']."\")";

				if (mysqli_query($conn, $sql)) {
					echo "Added details, refreshing data...";
                    header("refresh:3;url=http://localhost:8080/college-system/home.php?page=events.php");
				}
				else {
					echo "Error: ".mysqli_error($conn);
				}

				mysqli_close($conn);
        }
				
		?>
    </div>
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
                <td><input type='number' name='EventId' placeholder='".$row["S5t"]."'></td>
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
