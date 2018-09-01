<html>
<title>Login</title>
<head>
	<link rel="stylesheet" type="text/css" href="Addons/login.css">
    <script>
        function forgot(){
            window.alert("Mail ur details at peacock@gmail.com");
        }
    </script> 
</head>
<body>
    <div class="block">
      
        <div class="image">
            <img src="Addons/person-flat.png" alt="P">
        </div>
      
        <div class="form">
      
            <form action="#" method="POST">
                <p class="formp">Username</p>
                <input type=text placeholder="Enter username">
                <p class="formp">Password</p>
                <input type=password placeholder="Enter password"><br><br>
                <input type=submit value="Login"><br>
                <input type=button value="Reset">
                <a href="" onclick="forgot()"><p class="forgot">Forgot your username or password?</p></a>
            </form>
      	
      		<?php
	            if (isset($_GET['login'])) {  
	                session_start();
	                if ($_POST['id']=="0") {
	                    $_SESSION['type']="admin";
	                }
	                else {
	                    $_SESSION['type']="user";
	                }
	                $_SESSION['name']=$_POST['id'];
	                header("Location: update.php?id=".$_SESSION['name']);
	            }
	        ?>
	    </div>
        
    </div>

</body>
</html>
