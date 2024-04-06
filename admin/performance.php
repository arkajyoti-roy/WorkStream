<?php
include '../conn.php';

session_start();
error_reporting(0);
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}

$redx = $_POST['deptmwe'];
$data = mysqli_query($conn, "SELECT * FROM dept;");
$data2 = mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$redx' ORDER BY id DESC;");
$email = $_SESSION["email"];
$dataxc = mysqli_query($conn, "SELECT * FROM admin_login WHERE `email`='$email';");
$nxm = mysqli_fetch_array($dataxc);
$nx = $nxm['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>



    <link rel="icon" href="logo.png">





    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


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

                <!-- <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a> -->

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
                <input type="text" id="search_bar" name="search_bar" readonly style="border: #fff;">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    $('.dashboard').click(function() {
                        $.ajax({
                            url: 'man_employees.php',
                            success: function(response) {
                                $('.hg').css('display', 'none');
                            }
                        });
                    });


                    $(document).ready(function() {
                        $('#n3').change(function() {

                            $('#bt').click();

                        });


                    });
                </script>


            </div>


            <div class="nm">
                <h4 class="re"> <?php echo $nx; ?></h4>
                <h5 class="er">Admin</h5>
            </div>
            <style>

            </style>
            <img src="1.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Employee Performance</span>
                </div>
                <div class="main-skills">
                    <div class="" id="blur">

                        <br>
                        <form action="" method="POST">
                            <select name="deptmwe" id="n3" style="background-color: transparent; border: 1px solid black; border-radius: 4px;" required>
                                <option value="select">Select</option>
                                <?php

                                if ($total = mysqli_num_rows($data) > 0) {
                                    $is = 0;

                                    while ($result = mysqli_fetch_array($data)) {
                                ?>
                                        <option value="<?php echo $result['deptm']; ?>"><?php echo $result['deptm']; ?></option>
                                <?php
                                        $is++;
                                    }
                                } else {
                                }
                                ?>
                            </select>
                            <button type="submit" style="display: none;" id="bt">SELECT</button>
                        </form>
                    </div>

                    <style>

                    </style>



                    <div class="dash-content" id="fpm">
                        <div class="overview">
                            <div class="title">
                                <i class="uil uil-users-alt"></i>
                                <span class="text">Staff of Department, <?php echo $redx; ?></span>




                            </div>


                            <style>
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

                                .menu-items li a {
                                    margin-left: 30px;
                                    display: flex;
                                    align-items: center;
                                    height: 50px;
                                    text-decoration: none;
                                    position: relative;
                                }


                                #bt {
                                    padding: 0.5% 4%;
                                    background-color: skyblue;
                                    border-radius: 4px;
                                    margin-top: -36%;
                                    height: 55px;
                                    cursor: pointer;
                                    font-weight: 600;
                                    font-size: 18px;
                                }

                                #fpm {
                                    margin-top: -75px;
                                }

                                .search-box1 {
                                    margin-left: 30%;
                                    height: 45px;
                                    max-width: 600px;
                                    width: 100%;
                                    margin: 0 30px;
                                }

                                .search-box1 input {
                                    margin-left: 30%;
                                    margin-top: -34px;
                                    position: absolute;
                                    border: 1px solid var(--border-color);
                                    background-color: var(--panel-color);
                                    padding: 0 25px 0 50px;
                                    border-radius: 5px;
                                    height: 5%;
                                    width: 48%;
                                    color: var(--text-color);
                                    font-size: 15px;
                                    font-weight: 400;
                                    outline: none;
                                }

                                .search-box1 .icon {
                                    margin-left: 64%;
                                    position: absolute;
                                    left: 7px;
                                    font-size: 22px;
                                    z-index: 10;
                                    top: 50%;
                                    transform: translateY(-47%);
                                    color: gray;
                                }
                            </style>




                            <div class="mg_dept">
                                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Emp ID</th>
                                            <th>Photo</th>
                                            <th>Employee Name</th>
                                            <th>Department Name</th>
                                            <th>Role</th>
                                            <th>Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <div class="">
                                            <?php
                                            if ($total2 = mysqli_num_rows($data2) > 0) {
                                                $j = 0;

                                                while ($result2 = mysqli_fetch_array($data2)) {
                                            ?>

                                                    <tr style="text-align: center;" id="<?php echo $result2['empid']; ?>">
                                                        <td> <?php echo $result2['id']; ?> </td>
                                                        <td> <?php echo $result2['empid']; ?> </td>
                                                        <td> <img src="../<?php echo $result2['img'] ?>" style="border-radius: 5px; height: 100px; width: 100px;"> </td>
                                                        <td> <?php echo $result2['name']; ?> </td>
                                                        <td> <?php echo $result2['deptm']; ?> </td>
                                                        <td> <?php echo $result2['man']; ?> </td>
                                                        <td>
                                                            <form action="performance_emp.php" method="post">
                                                                <input type="text" name="j1" style="display: none;" value="<?php echo $result2['name']; ?>">
                                                                <input type="text" name="j2" style="display: none;" value="<?php echo $result2['deptm']; ?>">
                                                                <button class="vibrant-y">View</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                            <?php
                                                    $j++;
                                                }
                                            } else {
                                                echo "no FoUnD";
                                            }
                                            ?>
                                        </div>
                                    </tbody>
                                </table>

                                <style>
                                    #t {
                                        border: none;
                                        padding: 0.5%;
                                        margin: 1%;
                                        border-radius: 5px;
                                        width: 98%;

                                    }

                                    #t th {
                                        padding: 0.5%;
                                        border: none;
                                        margin: 2%;
                                        border-radius: 3px;
                                        color: var(--text-color);
                                    }

                                    #t td {
                                        padding: 1.2%;
                                        border: none;
                                        border-radius: 3px;
                                        text-align: center;
                                        color: var(--text-color);
                                    }

                                    #t tr {
                                        padding: 2%;
                                        color: var(--text-color);

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

                                    .vibrant-x {
                                        background: -webkit-linear-gradient(top, rgb(255, 133, 102, 0.32) 20%, rgb(255, 77, 77) 70%);
                                        border: none;
                                        border-radius: 4px;
                                        width: 53px;
                                        cursor: pointer;
                                        padding: 1%;
                                        margin: 1%;
                                    }

                                    .vibrant-y {
                                        background: -webkit-linear-gradient(top, #80bfff 20%, rgb(78 78 172) 70%);
                                        color: #e4f1ff;
                                        border: none;
                                        border-radius: 6px;
                                        width: 69px;
                                        cursor: pointer;
                                        padding: 1%;
                                        margin: 1%;
                                    }

                                    .vibrant-y:hover {
                                        background: -webkit-linear-gradient(top, #daecff 20%, rgb(0 148 235) 70%);
                                        border: 5px transparent;
                                        color: #000;
                                        border: none;
                                        border-radius: 6px;
                                        width: 69px;
                                        cursor: pointer;
                                        padding: 1%;
                                        margin: 1%;
                                    }



                                    #formx {
                                        background-color: #fff;
                                        border-radius: 7px;
                                        width: 400px;
                                        height: 515px;
                                        position: fixed;
                                        border: 1px solid black;
                                        box-shadow: 0px 0px 2px 18px rgba(0, 0, 0, 0.1);
                                        opacity: 0.9;
                                        padding: 0.5%;
                                        margin-top: -15%;
                                        margin-left: 29%;
                                        display: none;
                                    }

                                    #formx input {
                                        width: 98%;
                                        height: 37px;
                                        border: 1px solid black;
                                        border-radius: 5px;
                                        text-align: center;
                                        padding: 2%;
                                        margin-left: 1%;
                                        margin-bottom: 5px;
                                    }

                                    #formx select {
                                        width: 98%;
                                        height: 37px;
                                        border: 1px solid black;
                                        border-radius: 5px;
                                        text-align: center;
                                        padding: 2%;
                                        margin-left: 1%;
                                        margin-bottom: 5px;

                                    }

                                    #formx label {
                                        color: black;
                                        font-size: medium;
                                        margin: 2%;
                                    }

                                    .sub2 {
                                        width: 68%;
                                        background-color: lightblue;
                                        color: #000;
                                        border-radius: 5px;
                                        padding: -1% 2%;
                                        margin-left: 16%;
                                        margin-top: 12px;
                                        cursor: pointer;
                                    }

                                    #formx h4 {
                                        cursor: pointer;
                                        display: flexbox;
                                        margin: auto;
                                    }

                                    .c1 {
                                        display: flex;

                                    }
                                </style>
                                <style>
                                    #ed {
                                        background-color: #fff;
                                        border-radius: 7px;
                                        width: 400px;
                                        /* height: 300px; */
                                        position: fixed;
                                        border: 1px solid black;
                                        box-shadow: 0px 0px 2px 18px rgba(0, 0, 0, 0.1);
                                        opacity: 0.9;
                                        padding: 0.5%;
                                        margin-top: -15%;
                                        margin-left: 29%;
                                        display: none;
                                    }


                                    #ed input {
                                        width: 98%;
                                        height: 37px;
                                        border: 1px solid black;
                                        border-radius: 5px;
                                        text-align: center;
                                        padding: 2%;
                                        margin-left: 1%;
                                        margin-bottom: 5px;
                                    }

                                    #ed select {
                                        width: 98%;
                                        height: 37px;
                                        border: 1px solid black;
                                        border-radius: 5px;
                                        text-align: center;
                                        padding: 2%;
                                        margin-left: 1%;
                                        margin-bottom: 5px;

                                    }

                                    #ed label {
                                        color: black;
                                        font-size: medium;
                                        margin: 2%;
                                    }


                                    #ed h4 {
                                        cursor: pointer;
                                        display: flexbox;
                                        margin: auto;
                                    }

                                    .c1 {
                                        display: flex;

                                    }
                                </style>

    </section>

    <script src="script.js"></script>


    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>



</body>

</html>