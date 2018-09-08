<?php
	// include 'session.php';
	if ($_SESSION['type']=="admin") {
		include 'eventsadmin.php';
	}
	else {
		include 'events.php';
	}
?>