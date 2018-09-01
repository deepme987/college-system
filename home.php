<html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="Addons/home.css">
</head>
<body>

    <?php
        include 'session.php';
    ?>

    <div class="header">

        <div class="leftheader">
            <p class="pheader">EduSystem</p>
        </div>

        <div class="rightheader">
            <ul class="mainddheader">
                <li>Name</li>
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

        <div class="asideleft">

            <div class="iasideleft">
                <ul class="ulasideleft">
                <li><a href="home.php">Dashboard</a></li>
                <li><a href="#">Attendance record</a></li>
                <li><a href="#">Assignments</a></li>
                <li><a href="#">Events in college</a></li>
                <li><a href="#">Timetable</a></li>
                <li><a href="home.php?page=update.php&id=">My profile</a></li>
                </ul>
            </div>
        </div>

        <div class="maincontent">
            <?php
                include $_GET['page'];
            ?>
        </div>

        <div class="asideright">
            
        </div>

    </div>

</body>
</html>
