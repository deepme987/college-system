<?php
	
	$user = 'student';
	$pass = 'sakec';
	$db = 'students';

	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

	$get_all = "select * from profile";
	
	$data = mysqli_query($conn, $get_all) or die("No records found.");

	echo "<table><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>Reg No</th><th>Class</th><th>Div</th><th>Roll No</th><th>Mobile</th><th>Address</th>";

	while($row = mysqli_fetch_assoc($data)) {
		echo "<tr><td>".$row["UserId"]."</td><td>".$row["Fname"]."</td><td>".$row["Lname"]."</td><td>".$row["RegNo"]."</td><td>".$row["Class"]."</td><td>".$row["Division"]."</td><td>".$row["RollNo"]."</td><td>".$row["MobNo"]."</td><td>".$row["Addr"]."</td></tr>";
	}
	echo "</table>"; 

	mysqli_close($conn);
?>