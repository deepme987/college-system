<!--Test-->

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
                <li><a href="" onclick="dropdown()">Name</a></li>
            </ul>

            <div class="ddblock" style="display:block">
                <ul class="insideddheader">
                    <li><a href="home.php?page=update.php" >Profile</a></li>
                    <li onclick="needhelp()"><a href="" >Need help?</a></li>
                    <li ><a href="index.php">Logout</a></li>
                </ul>
            </div>
            
            <script type="text/javascript" >
                function dropdown(){
                    document.getElementByClassName("ddblock").style.display="none";
                }
                function needhelp()
                {
                    window.alert("mail ur problems at peacock@gmail.com");
                }
            </script>
        </div> 
    </div>

    <div class="flex-container">
            <div class="asideleft">
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
            <div class="iasideright">
                    <!--<p>TimeTable</p>
                    <hr>-->
	               <table class="asiderighttable">
                        <tr>
                            <th>TIME</th>
                            <th>DAY</th>
                        </tr>
                        <tr>
                            <td>8.15-9.15</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>9.15-10.15</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>10.15-11.15</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>11.15-12.15</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>1.00-2.00</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>2.00-3.00</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>3.00-4.00</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>4.00-5.00</td>
                            <td>blasss</td>
                        </tr>
                        <tr>
                            <td>5.00-6.00</td>
                            <td>blasss</td>
                        </tr>
                </table>
            </div>
        </div>

    </div>

    <script src="Addons/js.js" type="text/javascript"></script>
</body>
</html>
