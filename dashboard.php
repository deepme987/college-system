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
        $x=40;
        $y=20;
		echo'<div class="container">
                <div class="details">
                    <p>Details:<p>
                    <hr>
                    <ul class="left">
                    <li>Name: </li>
                    <li>smartcard no:</li>
                    <li>class:</li>
                    </ul>
				    <ul class="right">
				    <li>'.$row["Fname"].' '.$row["Lname"].'</li>
				    <li>'.$row["UserId"].'</li>
				    <li>'.$row["Class"].' - '.$row["Division"].' - '.$row["RollNo"].'</li>
                    </ul>
                </div>
                <div class="attendance">
                    <p>Attendance:</p>
                    <hr>
                    <table class="tattendance">
                    <tr>
                    <th>Total</th>
                    <th>Total Attended</th>
                    <th>Percentage</th>
                    </tr>
                    <tr>
                    <td>'.$x.'</td>
                    <td>'.$y.'</td>
                    <td>'.($y/$x)*100 .'</td>
                    </tr>
                    </table>
                </div>
                <div class="notification">
                    <p>Assignment Pending:</p>
                    <hr>
                    <p></p>
                </div>
                <div class="events">
                    <p>Events:</p>
                    <hr>
                    <p></p>
                </div>
                    

            </div>';

		mysqli_close($conn);
	?>
	
</body>
</html>