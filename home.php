<html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="Addons/main.css">
</head>
<body>

    <div class="header">

        <div class="leftheader">
            <p class="pheader">EduSystem</p>
        </div>

        <div class="rightheader">
            <ul class="mainddheader">
                <li>Name</li>
                <li><a href="login.php">Logout</a></li>
            </ul>

            <div class="block">
                <ul class="insideddheader">
                    <li>Profile</li>
                    <li>Need help?</li>
                    <li>logout</li>
                </ul>
            </div>
        </div> 
    </div>

    <div class="flex-container">
            <div class="iasideleft">
                <ul class="nav">
                <li><a class="btn active" href="home.php">Dashboard</a></li>
                <li><a class="btn" href="#">Attendance record</a></li>
                <li><a class="btn" href="#">Assignments</a></li>
                <li><a class="btn" href="#">Events in college</a></li>
                <li><a class="btn" href="home.php?page=list.php">Student List</a></li>
                <li><a class="btn" href="#">Timetable</a></li>
                <li><a class="btn" href="home.php?page=update.php">My profile</a></li>
                </ul>
            </div>

        <div class="maincontent">
            <?php
                if (isset($_GET['page'])&&$_GET['page']!=""){
                    include $_GET['page'];
                }
            ?>
        </div>

        <div class="asideright">
            
        </div>

    </div>

    <script src="Addons/js.js" type="text/javascript"></script>
</body>
</html>
