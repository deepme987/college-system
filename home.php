<!--Test-->
<!-- Remove Test -->
<!-- Try 2 -->
<html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="Addons/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="header">

        <div class="leftheader">
            <p class="pheader">EduSystem</p>
        </div>

        <div class="rightheader">
            <ul class="mainddheader">
                <li><a id="dropdown" href="#" onclick="#">Name        <i class="fa fa-angle-down"></i></a></li>
            </ul>

            <div id="ddblock" style="display:none">
                <ul class="insideddheader">
                    <li><a href="home.php?page=update.php" >Profile</a></li>
                    <li onclick="needhelp()"><a href="" >Need help?</a></li>
                    <li ><a href="index.php">Logout</a></li>
                </ul>
            </div>
            
            <script type="text/javascript" >
                    function needhelp()
                    {
                        window.alert("mail ur problems at peacock@gmail.com");
                    }
                    
                    $(document).ready(function(){
                       $("#dropdown").click(function(){
                            $("#ddblock").toggle();
                        });
                    });
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

                else {
                    include 'dashboard.php';
                }
            ?>
        </div>

        <?php

            $user = 'student';
            $pass = 'sakec';
            $db = 'students';

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $get_all = "select * from timetable";
            
            $data = mysqli_query($conn, $get_all) or die("No records found.");

            $row = mysqli_fetch_assoc($data);


            // $day = "\"".date('l')."\"";
            $day = "Tuesday";

            echo '<div class="asideright">
                <div class="iasideright">
                        <p class="tthead" align="center">Time Table for <br>'.$day.' </p>
                        <table class="asiderighttable" >
                            <tr>
                                <th>Time</th>
                                <th>Subject</th>
                            </tr>';
                            echo '<tr>
                                <td>9.15-10.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';

                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>10.15-11.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>11.15-12.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>1.00-2.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>2.00-3.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>3.00-4.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>4.00-5.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>
                    </table>
                </div>
            </div>';
            mysqli_close($conn);
        ?>

    </div>

    <script src="Addons/js.js" type="text/javascript"></script>
</body>
</html>
