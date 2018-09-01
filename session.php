	<?php
		session_start();
		if (isset($_SESSION['name'])) {
			if (isset($_GET['id'])) {
				if ($_SESSION['name']!=$_GET['id']&&$_SESSION['type']!="admin") {
					exit("Not enough privilleges.");
				}
			}
			else {
				// header("Location: ".$_SERVER['REQUEST URI']."?id=".$_SESSION['name']."&page=".$_GET['page']);
			}
		}
		else {
			exit("Kindly login first.");
		}
	?>