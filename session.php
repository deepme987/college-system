<?php
	session_start();
	if (!isset($_SESSION['name'])||$_SESSION['name']=="") {
		header("Location: login.php");
	}
?>