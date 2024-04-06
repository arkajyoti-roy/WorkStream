<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$email = $_SESSION["email"];
$data2 = mysqli_query($conn, "SELECT * FROM admin_login WHERE `email`='$email';");
$nxm = mysqli_fetch_array($data2);
$nx = $nxm['name'];

$data4a = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Designing Team'      AND `year` = '2023' ORDER BY `year` DESC ;");
$data4b = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Marketing'           AND `year` = '2023' ORDER BY `year` DESC ;");
$data4c = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Development Team'    AND `year` = '2023' ORDER BY `year` DESC ;");
$data4d = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Management'          AND `year` = '2023' ORDER BY `year` DESC ;");
$data4e = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Customer Service'    AND `year` = '2023' ORDER BY `year` DESC ;");
$data4f = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Designing Team'      AND `year` = '2024' ORDER BY `year` DESC ;");
$data4g = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Marketing'           AND `year` = '2024' ORDER BY `year` DESC ;");
$data4h = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Development Team'    AND `year` = '2024' ORDER BY `year` DESC ;");
$data4i = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Management'          AND `year` = '2024' ORDER BY `year` DESC ;");
$data4j = mysqli_query($conn, "SELECT * FROM salary WHERE `deptm`='Customer Service'    AND `year` = '2024' ORDER BY `year` DESC ;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="logo.png">
    <title>Statics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
                <li><a href="task.php">
                        <i class="uil uil-check-square"></i>
                        <span class="link-name">Task</span>
                    </a></li>
                <li><a href="salary.php">
                        <i class="uil uil-rupee-sign" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Salary</span>
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
            <br><br>

            <ul class="logout-mode11">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name" class="df">Logout</span>
                    </a></li>

                <div class="mode-toggle">

                </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">

                <input type="text" id="search_bar" name="search_bar" readonly style="border: #fff;">


            </div>

            <div class="nm">
                <h4 class="re"> <?php echo $nx; ?></h4>
                <h5 class="er">Admin</h5>
            </div>




            <img src="1.jpg" alt="eror">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-rupee-sign"></i>
                    <span class="text">Salary</span>
                </div>
            </div>
        </div>



        <?php
        if ($total4a = mysqli_num_rows($data4a) > 0) {
            $ja = 0;

            while ($result4a = mysqli_fetch_array($data4a)) {
        ?>

                <?php
                global  $totalNetSalaryaa;
                $totalNetSalaryaa += $result4a['net_salary']; ?>
        <?php
                $ja++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4b = mysqli_num_rows($data4b) > 0) {
            $jb = 0;

            while ($result4b = mysqli_fetch_array($data4b)) {
        ?>

                <?php
                global  $totalNetSalaryab;
                $totalNetSalaryab += $result4b['net_salary']; ?>
        <?php
                $jb++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4c = mysqli_num_rows($data4c) > 0) {
            $jc = 0;

            while ($result4c = mysqli_fetch_array($data4c)) {
        ?>

                <?php
                global  $totalNetSalaryac;
                $totalNetSalaryac += $result4c['net_salary']; ?>
        <?php
                $jc++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4d = mysqli_num_rows($data4d) > 0) {
            $jd = 0;

            while ($result4d = mysqli_fetch_array($data4d)) {
        ?>

                <?php
                global  $totalNetSalaryad;
                $totalNetSalaryad += $result4d['net_salary']; ?>
        <?php
                $jd++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4e = mysqli_num_rows($data4e) > 0) {
            $je = 0;

            while ($result4e = mysqli_fetch_array($data4e)) {
        ?>

                <?php
                global  $totalNetSalaryae;
                $totalNetSalaryae += $result4e['net_salary']; ?>
        <?php
                $je++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>







        <?php
        if ($total4f = mysqli_num_rows($data4f) > 0) {
            $jlo = 0;

            while ($result4f = mysqli_fetch_array($data4f)) {
        ?>

                <?php
                global  $totalNetSalaryaf;
                $totalNetSalaryaf += $result4f['net_salary']; ?>
        <?php
                $jlo++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4g = mysqli_num_rows($data4g) > 0) {
            $jg = 0;

            while ($result4g = mysqli_fetch_array($data4g)) {
        ?>

                <?php
                global  $totalNetSalaryag;
                $totalNetSalaryag += $result4g['net_salary']; ?>
        <?php
                $jg++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4h = mysqli_num_rows($data4h) > 0) {
            $jh = 0;

            while ($result4h = mysqli_fetch_array($data4h)) {
        ?>

                <?php
                global  $totalNetSalaryah;
                $totalNetSalaryah += $result4h['net_salary']; ?>
        <?php
                $jh++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4i = mysqli_num_rows($data4i) > 0) {
            $ji = 0;

            while ($result4i = mysqli_fetch_array($data4i)) {
        ?>

                <?php
                global  $totalNetSalaryai;
                $totalNetSalaryai += $result4i['net_salary']; ?>
        <?php
                $ji++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <?php
        if ($total4j = mysqli_num_rows($data4j) > 0) {
            $jj = 0;

            while ($result4j = mysqli_fetch_array($data4j)) {
        ?>

                <?php
                global  $totalNetSalaryaj;
                $totalNetSalaryaj += $result4j['net_salary']; ?>
        <?php
                $jj++;
            }
        } else {
            // echo "no FoUnD";
        }
        ?>


        <div>

            <div id="chart_div" style="width: 900px; height: 500px;"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawVisualization);

                function drawVisualization() {
                    // Some raw data (not necessarily accurate)
                    var data = google.visualization.arrayToDataTable([
                        ['Yaer', 'Designing Team', 'Marketing', 'Development Team', 'Management', 'Customer Care', 'Average'],
                        ['2022', 200434353, 143435876, 520140601, 95756498, 49685260, 56565453],
                        ['2023', <?php echo $totalNetSalaryaa; ?>, <?php echo $totalNetSalaryab; ?>, <?php echo $totalNetSalaryac; ?>, <?php echo $totalNetSalaryad; ?>, <?php echo $totalNetSalaryae; ?>, 7856241],
                        ['2024', <?php echo $totalNetSalaryaf; ?>, <?php echo $totalNetSalaryag; ?>, <?php echo $totalNetSalaryah; ?>, <?php echo $totalNetSalaryai; ?>, <?php echo $totalNetSalaryaj; ?>, 8965214]
                    ]);

                    var options = {
                        title: 'Total Salary Spend on Department Salaries',
                        vAxis: {
                            title: 'Total Salary'
                        },
                        hAxis: {
                            title: 'Year'
                        },
                        seriesType: 'bars',
                        series: {
                            5: {
                                type: 'line'
                            }
                        }
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
        </div>

        <div class="dash-content">
            <div class="overview">




                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">2023</span>
                </div>

                <table class="table">
                    <thead class="table-light">
                        <tr style="text-align: center;">
                            <th>SL.</th>
                            <th>Department</th>
                            <th>Net Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="" style="text-align: center;">

                            <td>01</td>
                            <td>Designing Team</td>
                            <td>₹<?php echo $totalNetSalaryaa; ?></td>
                        </tr>

                        <!-- <tr> -->
                        <tr class="" style="text-align: center;">


                            <td>02</td>
                            <td>Marketing</td>
                            <td>₹<?php echo $totalNetSalaryab; ?></td>
                        </tr>

                        <tr class="" style="text-align: center;">


                            <td>03</td>
                            <td>Development Team</td>
                            <td>₹<?php echo $totalNetSalaryac; ?></td>
                        </tr>

                        <tr class="" style="text-align: center;">
                            <td>04</td>
                            <td>Management</td>
                            <td>₹<?php echo $totalNetSalaryad; ?></td>
                        </tr>

                        <tr class="" style="text-align: center;">
                            <td>05</td>
                            <td>Customer Service</td>
                            <td>₹<?php echo $totalNetSalaryae; ?></td>
                        </tr>

                    </tbody>
                </table>





                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">2024</span>
                </div>


                <table class="table">
                    <thead class="table-light">
                        <tr style="text-align: center;">
                            <th>SL.</th>
                            <th>Department</th>
                            <th>Net Salary</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr style="text-align: center;">
                            <td>01</td>
                            <td>Designing Team</td>
                            <td>₹<?php echo $totalNetSalaryaf; ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>02</td>
                            <td>Marketing</td>
                            <td>₹<?php echo $totalNetSalaryag; ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>03</td>
                            <td>Development Team</td>
                            <td>₹<?php echo $totalNetSalaryah; ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>04</td>
                            <td>Management</td>
                            <td>₹<?php echo $totalNetSalaryai; ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>05</td>
                            <td>Customer Service</td>
                            <td>₹<?php echo $totalNetSalaryaj; ?></td>
                        </tr>

                    </tbody>

                </table>




            </div>
        </div>


        <style>
            .logout-mode11 {
                margin-top: -40.8px;
                border-top: 1px solid var(--border-color);
                padding-top: 10px;
            }
          

            li {
                margin-left: -33px;
            }

            .re {
                font-size: 18px;
                color: #000;
                display: block;
            }

            .er {
                font-size: 12px;
                color: navy;
            }

            li {
                margin-left: -35px;
            }

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
        </style>


    </section>
    <script src="script.js"></script>



</body>

</html>