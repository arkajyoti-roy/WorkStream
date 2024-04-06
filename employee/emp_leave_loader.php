<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_03"] == false) {
    header("location: log.php");
}
// error_reporting(0);
$email2 = $_SESSION["email2"];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email2';");

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];
$data2 = mysqli_query($conn, "SELECT * FROM `leave` WHERE email = '$email2' ORDER BY id DESC;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="loge.png">
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
                <li><a href="emp_task.php">
                        <i class="uil uil-check-square"></i>
                        <span class="link-name">Task</span>
                    </a></li>
                <li><a href="emp_project.php">
                        <i class="uil uil-file-edit-alt"></i>
                        <span class="link-name">Project</span>
                    </a></li>
                <li><a href="emp_performance.php">
                        <i class="uil uil-user-check"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
                <li><a href="emp_salary.php">
                        <i class="uil uil-rupee-sign"></i>
                        <span class="link-name">Salary</span>
                    </a></li>
                <li><a href="emp_leave.php">
                        <i class="uil uil-telegram-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Apply for Leave</span>
                    </a></li>
                <li><a href="emp_holiday.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">calander</span>
                    </a></li>
                <li><a href="emp_notice.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notice</span>
                    </a></li>
                <li><a href="emp_feedback.php">
                        <i class="uil uil-comment-alt-download"></i>
                        <span class="link-name">Feedback</span>
                    </a></li>
            </ul>

            <br><br><br>
            <br><br><br>

            <ul class="logout-mode">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <input type="text" readonly style="border-color: #fff;">
            </div>

            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>


            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""> </a>
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

                    <img src="../seed/plane.gif" alt="" id="formx">
            <?php
                    $i++;
                }
            } else {
                // echo "no FoUnD";
            }
            ?>


            <div class="form-group">
                <a href="emp_leave.php">

                    <input type="submit" value="Re-Apply" class="btn btn-primary btn-lg w-100 " name="submit">
                </a>
            </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Total Leaves</span>
                </div>


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead></thead>
                    <tr>
                        <th>SL.</th>
                        <th>Type</th>
                        <th>Reason</th>
                        <th>Specify</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <thead>
                        <div class="">
                            <?php
                            if ($total2 = mysqli_num_rows($data2) > 0) {
                                $j = 0;

                                while ($result2 = mysqli_fetch_array($data2)) {
                            ?>

                                    <tr class="">
                                        <td> <?php echo $result2['id']; ?> </td>
                                        <td> <?php echo $result2['type']; ?> </td>
                                        <td> <?php echo $result2['reason']; ?> </td>
                                        <td> <?php echo $result2['specify']; ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result2['start_date'])); ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result2['last_date'])); ?> </td>
                                        <td> <?php echo $result2['status']; ?> </td>

                                        <td>

                                            <form action="emp_leave_delete.php" method="POST">
                                                <input type="text" name="j1" style="display: none;" value="<?php echo $result2['id']; ?>">
                                                <button class="vibrant-x" type="submit">Delete</button>
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
                    </thead>

                </table>
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

                .re {
                    font-size: 18px;
                }

                .er {
                    font-size: 12px;
                    color: gray;
                }

                .top img {
                    width: 45px;
                    height: 45px;
                    border-radius: 50%;
                }

                #formx {
                    background-color: #fff;
                    border-radius: 7px;
                    width: 50%;
                    height: 285px;
                    margin-top: -6.44%;
                    opacity: 0.9;
                    padding: 0.5%;
                    margin-left: 20%;
                    display: flex;
                }

                .menu-items li a {
                    margin-left: -3px;
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


    </section>

    <style>
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
        }

        .btn {
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
            margin-left: 42.4%;
            margin-top: 3%;
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
    </style>



</body>

</html>