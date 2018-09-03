<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DashBoard</title>
	<link rel="stylesheet" href="Addons/dashboard.css">
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
                    <th>Attended</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    </tr>
                    <tr>
                    <td>'.$row["Attended"].'</td>
                    <td>'.$row["Total"].'</td>';
                    if ($row["Total"]!=0) {
                        echo '<td>'.$row["Percent"].'%</td>
                    ';
                    }
                    else {
                        echo '<td>0%</td>';
                    }
                    echo '
                    </tr>
                    </table>
                </div>
                <div class="notification">
                    <p>Assignment:</p>
                    <hr>
                    <p></p>
                </div>
                <div class="events">
                    <p>Events:</p>
                    <hr>
                    <p>';

            mysqli_close($conn);
            $user = 'student';
            $pass = 'sakec';
            $db = 'students';
            $i = 0;

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $fetch = "select * from events";

            $temp = mysqli_query($conn, $fetch) or die("Record not found.");

            while($row = mysqli_fetch_assoc($temp)) {
                if($i<2){
                echo "Name: ".$row["event_name"]."<hr>Event Id: ".$row["id"]."<br>Date: ".$row["date"]."    Time".$row["time"]."    Venue: ".$row["venue"];
                $i++;
                }
                else {
                    break;
                }
            }
            echo "</table></div>"; 


                    echo '</p></div>';

		mysqli_close($conn);
	?>
	
</body>
</html>