<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$data = mysqli_query($conn, "SELECT * FROM dept;");
$data3 = mysqli_query($conn, "SELECT * FROM man_task ORDER BY id DESC;");

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
    <link rel="icon" href="logo.png">
    <title>Task</title>


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
                        <i class="uil uil-check-square" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Task</span>
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


                <input type="text" id="search_bar" name="search_bar" readonly style="border: #fff;">




            </div>
            <div class="nm">
                <h4 class="re"> <?php echo $nx; ?></h4>
                <h5 class="er">Admin</h5>
            </div>
            <style>

            </style>
            <img src="1.jpg" alt="eror">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-file-edit-alt"></i>
                    <span class="text">Task</span>
                </div>
            </div>
        </div>




        <h3 style=" margin-left: 25px; margin-bottom: 10px; color: var(--text-color);">Create Project</h3>

        <form action="task_ass.php" method="POST" class="m1" style=" color: var(--text-color);">
            <div id="alt1">
                <label for="deptm">Department</label>
                <select name="deptm" id="n3" required style="border: #000;   border: 1px solid black; border-radius: 4px;">
                    <option value="select">Select</option>
                    <?php

                    if ($total = mysqli_num_rows($data) > 0) {
                        $i = 0;

                        while ($result = mysqli_fetch_array($data)) {
                    ?>
                            <option value="<?php echo $result['deptm']; ?>"><?php echo $result['deptm']; ?></option>
                    <?php
                            $i++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>
                </select>


                <button id="btn" type="submit">Create</button>

            </div>

            <br>


        </form>

        <div id="kom">

            <h3 style=" margin-left: 25px; margin-bottom: 10px; color: var(--text-color);">Completed Tasks</h3>

            <a href="task_history.php">

                <button id="btnxc" type="submit">View Details</button>
            </a>

        </div>







        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">Assigned Tasks</span>
                </div>

                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                    <thead>
                        <tr class="bg-dark">
                            <th>SL.</th>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Department</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <div class="">
                            <?php
                            if ($total3 = mysqli_num_rows($data3) > 0) {
                                $k = 0;

                                while ($result3 = mysqli_fetch_array($data3)) {
                            ?>

                                    <tr style="text-align: center;" id="<?php echo $result3['p_name']; ?>" class="">
                                        <td> <?php echo $result3['id']; ?> </td>
                                        <td> <?php echo $result3['p_name']; ?> </td>
                                        <td> <?php echo $result3['desc']; ?> </td>
                                        <td> <?php echo $result3['deptm']; ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result3['starting_date'])); ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result3['ending_date'])); ?> </td>

                                    </tr>
                            <?php
                                    $k++;
                                }
                            } else {
                                echo "no FoUnD";
                            }
                            ?>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>

        <style>
            .menu-items li a {
                margin-left: 30px;
                display: flex;
                align-items: center;
                height: 50px;
                text-decoration: none;
                position: relative;
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


            #btnxc {
                height: 30px;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                margin-left: 26px;
                text-align: center;
                font-size: 14px;
                cursor: pointer;
                padding: 0% 2%;
            }

            #kom {
                margin: -97px 0px -34px 726px;
            }

            li {
                margin-left: -33px;
            }


            .vibrant-y {
                background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
                border: none;
                border-radius: 4px;
                width: 58px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            #alt1 {
                display: flex;
                width: 98%;
                margin-left: 21px;
            }

            #alt1 input {
                display: flexbox;
                width: 15%;
                height: 30px;
                margin: 0 0.5%;

            }

            #alt1 select {
                display: flexbox;
                width: 15%;
                height: 30px;
                background-color: transparent;
                margin: 0 0.5%;

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

            #btn {
                height: 30px;
                width: 9%;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                margin-left: 12px;
                text-align: center;
                font-size: 14px;
                cursor: pointer;
            }

            #alt1 label {
                font-size: medium;
                margin: 0 0.5%;

            }

            #alt2 {
                display: none;
                width: 98%;
                margin-left: 21px;
            }

            #alt2 input {
                display: flexbox;
                width: 15%;
                height: 30px;
                margin: 0 0.5%;

            }

            #alt2 label {
                font-size: medium;
                margin: 0 0.5%;

            }

            #alt2 select {
                display: flexbox;
                width: 15%;
                background-color: transparent;
                height: 30px;
                margin: 0 0.5%;

            }




            #alt3 {
                margin-top: 25px;
                width: 700px;
                margin-left: 21px;
                display: none;
            }

            #alt3 label {
                font-size: medium;
            }

            #alt3 input {
                width: 97%;
                height: 44px;
                margin-top: 13px;
                margin-bottom: 13px;
            }

            #alt3 select {
                margin-top: 13px;
                margin-bottom: 13px;
                width: 97%;
                height: 42px;
                background-color: transparent;
            }

            .sl {
                margin: auto;

            }

            #m2 {
                height: 35px;
                width: 29%;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                cursor: pointer;
            }
        </style>
    </section>
    <script src="script.js"></script>



    <style>
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
        }

        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
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