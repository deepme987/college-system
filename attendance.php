<?php
	include 'session.php';
	if ($_SESSION['type']=="admin") {
		include 'add_attendance.php';
	}
	else {
		include 'check_attendance.php';
	}
?>