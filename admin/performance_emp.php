<?php
include '../conn.php';

session_start();
error_reporting(0);
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}

$data = mysqli_query($conn, "SELECT * FROM dept;");
$email = $_SESSION["email"];
$dataxc = mysqli_query($conn, "SELECT * FROM admin_login WHERE `email`='$email';");
$nxm = mysqli_fetch_array($dataxc);
$nx = $nxm['name'];
$nmc = $_POST['j1'];
$deptm = $_POST['j2'];


$a = mysqli_query($conn, "SELECT * FROM task WHERE `upload_date` > `ending_date` AND deptm = '$deptm' AND member LIKE '%$nmc%';");
$b = mysqli_query($conn, "SELECT * FROM task WHERE `upload_date` < `ending_date` AND deptm = '$deptm' AND member LIKE '%$nmc%';");
$c = mysqli_query($conn, "SELECT * FROM task WHERE `upload_date` = '1000-01-01' AND deptm = '$deptm' AND member LIKE '%$nmc%';");
$r = mysqli_num_rows($a);
$s = mysqli_num_rows($b);
$t = mysqli_num_rows($c);

$total = ($r + $s + $t);
$per = ($s / $total) * 100;


$data30 = mysqli_query($conn, "SELECT * FROM notice WHERE deptm= '$deptm' AND seen='not_seen' AND man='Manager';");

while ($mx = mysqli_fetch_array($data)) {

    $rx = $mx['deptm'];
    $ue++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="logo.png">
    <title>Performance</title>
</head>

<body>
    <nav>
        <div class="logo-name">
        <div class="logo-image">
                <img src="logo1.png" alt="p8">
                <!-- <img src="loge.png" alt="" id="p9"> -->
            </div>
            <div class="logo-image2">
                <img src="logo2.png" alt="" id="p9">
                <!-- <img src="loge.png" alt="" id="p9"> -->
            </div>

        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="dept.php">
                        <i class="uil uil-rope-way"></i>
                        <span class="link-name">Department</span>
                    </a></li>
                <li><a href="staff.php">
                        <i class="uil uil-users-alt"></i>
                        <span class="link-name">Staff</span>
                    </a></li>
                <li><a href="performance.php">
                        <i class="uil uil-tachometer-fast-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Performance</span>
                    </a></li>
                <li><a href="task.php">
                        <i class="uil uil-check-square"></i>
                        <span class="link-name">Task</span>
                    </a></li>
                <li><a href="salary.php">
                        <i class="uil uil-rupee-sign"></i>
                        <span class="link-name">Salary</span>
                    </a></li>
                <li><a href="leave.php">
                        <i class="uil uil-user-minus"></i>
                        <span class="link-name">Leave</span>
                    </a></li>
                <li><a href="calander.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Calender</span>
                    </a></li>
                <li><a href="feedback.php">
                        <i class="uil uil-comment-alt-download"></i>
                        <span class="link-name">Feedback</span>
                    </a></li>
                <li><a href="notice.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notice</span>
                    </a></li>
            </ul>
            <br><br>
            <br>


            <ul class="logout-mode">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <input type="text" value="" readonly style="border: #fff;">
            </div>
            <div class="nm">

                <h4 class="re"> <?php echo $nx ?></h4>
                <h5 class="er">Admin</h5>
            </div>

            <img src="1.jpg" alt="eror">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Performance</span>
                </div>
                <span class="text" style="font-weight:bold;"><?php echo $nmc ?></span>
            </div>
        </div>

        <style>
           nav .menu-items {
            margin-top: 14px;
            height: calc(100% - 90px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


        #p9 {
            height: 121px;
            width: 109px;
            border-radius: 0px;
            margin-top: -40px;
            margin-bottom: -40px;
            margin-left: 15px;
        }


        nav .logo-image img {
            width: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

            body::-webkit-scrollbar {
                width: 0px;
                height: 0px;
            }

            li {
                margin-left: -33px;
            }

            .re {
                font-size: 18px;
            }

            .er {
                font-size: 12px;
                color: blue;
            }

            #q {
                height: 615px;
                width: 900px;
                margin: -7% 0% 0% 13%;
            }

            #DF3 {
                height: 10px;
                width: 10px;
                background-color: #ff6666;
                font-size: 8px;
                color: white;
                text-decoration: none;
                padding: 1.5px;
                border-radius: 60px;
                margin-left: -8px;
                text-underline-offset: none;
            }

            .mk {
                text-decoration: none;
            }

            .jk2 {
                -webkit-transform: rotate(<?php echo $per ?>deg);
                -moz-transform: rotate(<?php echo $per ?>deg);
                -ms-transform: rotate(<?php echo $per ?>deg);
                -o-transform: rotate(<?php echo $per ?>deg);
                transform: rotate(<?php echo $per ?>deg);
                margin-left: -35%;
                margin: -8% 0% -3% -16.5%;
                height: 200px;
            }

            .jk1 {
                margin: -11% 0% 0% 27%;
                height: 200px;
            }

            #forest {
                margin: -11% 0% 0% 27%;
                display: flexbox;
            }

            #jungle {
                margin: -37% 0% 0% 56%;
                display: flexbox;
                width: 42%;
            }
        </style>


        <img src="../seed/meet.png" alt="" class="jk1">
        <img src="../seed/need.png" alt="" class="jk2">



        <div id="piechart_3d" style="width: 700px; height: 500px;" id="forest" style="margin-left:-20%"></div>



        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task Submission Type', 'Number od Submissions'],
                    ['On Time', <?php echo $s ?>],
                    ['After Due Date', <?php echo $r ?>],
                    ['Not Submitted', <?php echo $t ?>]
                ]);

                var options = {
                    title: 'Project Work Submissions',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>





        <table class="table" id="jungle">
            <thead>
                <tr class="bg-dark">
                    <th>Project Submission Type</th>
                    <th></th>
                    <th>Number of Events</th>
                </tr>

            </thead>
            <tbody class="table-group-divider">
                <div class="">

                    <tr class="">
                        <td>Total Projects Submitted</td>
                        <th>:</th>
                        <td> <?php echo $total; ?> </td>
                    </tr>

                    <tr class="">
                        <td> Projects Submitted on time</td>
                        <th>:</th>
                        <td> <?php echo $s; ?> </td>
                    </tr>

                    <tr class="">
                        <td>Delayed Projects Submitted</td>
                        <th>:</th>
                        <td> <?php echo $r; ?> </td>
                    </tr>

                    <tr class="">
                        <td> Projects Not Submitted</td>
                        <th>:</th>
                        <td> <?php echo $t; ?> </td>
                    </tr>

                </div>

            </tbody>

        </table>



    </section>


    <script src="script.js"></script>



</body>

</html>