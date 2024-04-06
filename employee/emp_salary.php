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

$data2 = mysqli_query($conn, "SELECT * FROM `leave` WHERE email = '$email2';");
$data45 = mysqli_query($conn, "SELECT * FROM salary WHERE `name`='$nm' ORDER BY id DESC LIMIT 3;");
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
    <title>Salary</title>

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
                        <i class="uil uil-rupee-sign" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Salary</span>
                    </a></li>
                <li><a href="emp_leave.php">
                        <i class="uil uil-telegram-alt"></i>
                        <span class="link-name">Apply for Leave</span>
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
                <input type="text" style="border: #fff;" readonly>
            </div>
            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>

            <a href="emp_personal.php"><img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-rupee-sign"></i>
                    <span class="text">Salary</span>
                </div>
            </div>
        </div>

        <form action="../pdf/generate.php" method="POSt">
            <label for="year">Select Year</label>
            <select name="year" id="" style="border: 1px solid black; border-radius: 4px;">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="month">Select Month</label>
            <select name="month" id="" required style="border: 1px solid black; border-radius: 4px;">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="submit" name="create" class="sub" value="Get Payslip">
        </form>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-receipt"></i>
                    <span class="text">Previous Salary Paid</span>
                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                    <thead>
                        <tr style="text-align: center;">
                            <th>SL.</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Month & Year</th>
                            <th>Basic</th>
                            <th>Allowance & Deduction</th>
                            <th>Net Salary</th>
                            <th>Get Payslip</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <div class="">
                            <?php
                            if ($total3 = mysqli_num_rows($data45) > 0) {
                                $k = 0;

                                while ($result3 = mysqli_fetch_array($data45)) {
                            ?>
                                    <tr class="" style="text-align: center;">
                                        <td> <?php echo $result3['id']; ?> </td>
                                        <td> <?php echo $result3['deptm']; ?> </td>
                                        <td> <?php echo $result3['name']; ?> </td>
                                        <td> <?php echo $result3['month']; ?> & <?php echo $result3['year']; ?> </td>
                                        <td>₹<?php echo $result3['basic']; ?> </td>
                                        <td>₹<?php echo $result3['total_allo']; ?> & ₹<?php echo $result3['total_ded']; ?> </td>
                                        <td>₹<?php echo $result3['net_salary']; ?> </td>
                                        <td>
                                            <form action="../pdf/generate.php" method="POST">
                                                <input type="text" name="year" style="display: none;" value="<?php echo $result3['year']; ?>">
                                                <input type="text" name="month" style="display: none;" value="<?php echo $result3['month']; ?>">
                                                <button class="vibrant-y" name="create">Get Payslip</button>
                                            </form>
                                        </td>
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
            body::-webkit-scrollbar {
                width: 0px;
                height: 0px;
            }

            .re {
                font-size: 18px;
            }

            a {
                margin-top: -3px;
                color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
                text-decoration: underline;
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



        <style>
            .vibrant-y {
                background: -webkit-linear-gradient(top, rgb(0, 0, 153, 0.32) 20%, rgb(0, 102, 255) 70%);
                border: none;
                border-radius: 4px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            .sub {
                width: 150px;
                height: 32px;
                background-color: skyblue;
                color: navy;
                border-radius: 6px;
            }

            form select {
                width: 22%;
                height: 32px;
                background-color: transparent;
                border-radius: 6px;
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

            li {
                margin-left: -33px;
            }
        </style>

    </section>
</body>

</html>