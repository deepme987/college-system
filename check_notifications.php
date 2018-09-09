<?php

	$user = 'student';
	$pass = 'sakec';
	$db = 'students';

	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

	$fetchdiv = "select Notifications from profile where UserId=\"".$_SESSION['name']."\"";

	$temp = mysqli_query($conn, $fetchdiv) or die("Record not found.");

	$div = mysqli_fetch_assoc($temp);

	if ($div['Notifications']!=NULL) {
		echo $div['Notifications'];
	}

	else {
		echo "No notifications";
	}

	mysqli_close($conn);
?>