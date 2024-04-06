<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: ../log.php");
}
// error_reporting(0);
$email2 = $_SESSION["email2"];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email2';");

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];
$deptm = $_SESSION['deptmy'];
$data2 = mysqli_query($conn, "SELECT * FROM `leave` WHERE email = '$email2' ORDER BY id DESC;");
$data30 = mysqli_query($conn, "SELECT * FROM notice WHERE deptm= '$deptm' AND seen='not_seen' AND man='Manager';");

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
    <title>Leave</title>

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">


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
                <li><a href="man_task.php">
                        <i class="uil uil-edit"></i>
                        <span class="link-name">Task</span>
                    </a></li>
                <li><a href="man_history.php">
                        <i class="uil uil-check-square"></i>
                        <span class="link-name">Task Completed</span>
                    </a></li>
                <li><a href="man_performance.php">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
                <li><a href="man_employees.php">
                        <i class="uil uil-users-alt"></i>
                        <span class="link-name">Employees</span>
                    </a></li>
                <li><a href="man_leave.php">
                        <i class="uil uil-telegram-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Apply for Leave</span>
                    </a></li>
                <li><a href="man_notice.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notice</span>
                    </a></li>
                <li><a href="man_salary.php">
                        <i class="uil uil-rupee-sign"></i>
                        <span class="link-name">Salary</span>
                    </a></li>
                <li><a href="man_holiday.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Calander</span>
                    </a></li>
                <li><a href="man_feedback.php">
                        <i class="uil uil-comment-alt-edit"></i>
                        <span class="link-name">Feedback</span>
                    </a></li>
            </ul>
            <br><br><br>

            <ul class="logout-mode">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <input type="text" value="" readonly style="border-color: #fff;">
            </div>
            <a href="man_seen.php" class="mk" id="fl"> <i style="font-size: 25px;" class="uil uil-bell"></i><span id="DF3"><?php echo mysqli_num_rows($data30); ?></span></a>
            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Manager</54>
            </div>

            <a href="man_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-telegram-alt"></i>
                    <span class="text">Apply for Leave</span>
                </div>
            </div>
        </div>

        <div>
            <?php

            if ($total = mysqli_num_rows($data) > 0) {
                $i = 0;

                while ($result = mysqli_fetch_array($data)) {
            ?>
                    <form action="man_leave_load.php" method="POST">
                        <input value="<?php echo $result['name']; ?>" name="name" style="display: none;">
                        <input value="<?php echo $result['email']; ?>" name="email" style="display: none;">
                        <input value="<?php echo $result['deptm']; ?>" name="deptm" style="display: none;">
                        <input value="<?php echo $result['man']; ?>" name="man" style="display: none;">

                        <div class="form-group">
                            <label>Reason :</label>
                            <input type="text" class="form-control" name="reason" placeholder="Enter the reason" required>
                        </div>

                        <div class="form-group">
                            <label>Staring Date :</label>
                            <input type="date" class="form-control" value="" name="start" id="myDate" required>
                        </div>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById("myDate").min = today;
                        </script>
                        <div class="form-group">
                            <label>Last Date :</label>
                            <input type="date" class="form-control" value="" name="last" id="myDate2" required>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                ($('#myDate')).change(function() {

                                    var def = document.getElementById("myDate").value;
                                    document.getElementById("myDate2").min = def;
                                });
                            });
                        </script>
                        <div class="form-group">
                            <input type="submit" value="Apply Now" class="btn btn-primary btn-lg w-100 " name="submit">
                        </div>
                    </form>
            <?php
                    $i++;
                }
            } else {
                // echo "no FoUnD";
            }
            ?>
        </div>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Total Leaves</span>
                </div>



                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                    <thead>

                        <tr style="text-align: center;">
                            <th>SL.</th>
                            <th>Reason</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <div class="">
                            <?php
                            if ($total2 = mysqli_num_rows($data2) > 0) {
                                $j = 0;

                                while ($result2 = mysqli_fetch_array($data2)) {
                            ?>

                                    <tr class="" style="text-align: center;">
                                        <td> <?php echo $result2['id']; ?> </td>
                                        <td> <?php echo $result2['reason']; ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result2['start_date'])); ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result2['last_date'])); ?> </td>
                                        <td> <?php echo $result2['status']; ?> </td>
                                        <td>
                                            <form action="man_leave_delete.php" method="POST">
                                                <input type="text" name="j1" style="display: none;" value="<?php echo $result2['id']; ?>">
                                                <button class="vibrant-x" id="myButton" type="submit">Delete</button>
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
            </div>
    </section>
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
            background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
            border: none;
            border-radius: 4px;
            width: 53px;
            cursor: pointer;
            padding: 1%;
            margin: 1%;
        }

        .btn-primary {
            color: #fff;
            background-color: #7571f9;
            /* border-color: #7571f9; */
        }

        .btn {
            /* padding: 7px 18px; */
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
        }




        .form-control {
            display: block;
            width: 100%;
            height: calc(2.0625rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            min-height: 40px;

            border-radius: 0;
            box-shadow: none;
            height: 45px;

        }

        .form-group {
            margin-bottom: 20px;
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

        .menu-items li a {
            margin-left: 30px;
            display: flex;
            align-items: center;
            height: 50px;
            text-decoration: none;
            position: relative;
        }

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