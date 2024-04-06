<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_03"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$em = $_SESSION["email2"];

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em' ;");

$datax = mysqli_query($conn, "SELECT * FROM staff WHERE `name` = '$nm';");

$mx = mysqli_fetch_array($datax);
$my = $mx['deptm'];

$data3 = mysqli_query($conn, "SELECT * FROM complete WHERE `submittedby`='$my'  ORDER BY id DESC;");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Project</title>

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <link rel="icon" href="loge.png">
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
                        <i class="uil uil-file-edit-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Project</span>
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
                <input type="text" style="border-color: #fff;" readonly required>
            </div>
            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>

            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview" style="display: block;">
                <div class="title">
                    <i class="uil uil-user-plus"></i>
                    <span class="text">Upload Project</span>
                </div>

            </div>
            <br>
            <img src="../seed/gif.gif" alt="" id="formx" loop="1" no-loopcount>

            <?php
            $datam = mysqli_query($conn, "SELECT * FROM complete WHERE `submittedby`='$my'  ORDER BY id DESC LIMIT 1;");
            $sd = mysqli_fetch_array($datam);
            $df = $sd['pro_name'];
            ?>

            <h3 class="loop"><?php echo $df; ?> Uploaded Successfully</h3>
            <a href="emp_project.php">
                <button class="football" style="display: blocks;">Upload Another</button>
            </a>

            <div class="dash-content" style="margin-top: -5%;">
                <div class="overview">
                    <div class="title">
                        <i class="uil uil-file-edit-alt"></i>
                        <span class="text">Task Completed</span>
                    </div>
                </div>
            </div>

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                <thead>

                    <tr class="bg-dark">
                        <th>SL.</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Submitted By</th>
                        <th>Uploaded On</th>
                        <th>Project File</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    <div class="">
                        <?php
                        if ($total3 = mysqli_num_rows($data3) > 0) {
                            $k = 0;

                            while ($result3 = mysqli_fetch_array($data3)) {
                        ?>

                                <tr class="">
                                    <td> <?php echo $result3['id']; ?> </td>
                                    <td> <?php echo $result3['pro_name']; ?> </td>
                                    <td> <?php echo $result3['description']; ?> </td>
                                    <td> <?php echo $result3['submitted']; ?> </td>
                                    <td> <?php echo date('d-M-Y', strtotime($result3['uploaded'])); ?> </td>
                                    <td style="color: navy;"> <a href="../zoom/<?php echo $result3['file']; ?>" download><?php echo $result3['pro_name']; ?> file</a> </td>
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
            <style>
                .top img {
                    width: 45px;
                    height: 45px;
                    border-radius: 50%;
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

                .loop {
                    margin-left: 37%;
                }

                .football {
                    background-color: lightblue;
                    color: #000;
                    border-radius: 5px;
                    height: 40px;
                    padding: 0% 2%;
                    margin-left: 39%;
                    cursor: pointer;
                }

                .menu-items li a {
                    margin-left: 30px;
                    display: flex;
                    align-items: center;
                    height: 50px;
                    text-decoration: none;
                    position: relative;
                }


                .hx1 {
                    display: flexbox;
                    width: 48%;
                }

                .hx2 {
                    display: flexbox;
                    width: 48%;
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

                #formx {
                    background-color: #fff;
                    border-radius: 7px;
                    width: 35%;
                    height: 271px;
                    margin-top: -6.44%;
                    opacity: 0.9;
                    padding: 0.5%;
                    margin-left: 28%;
                    display: flex;
                }

                #formx input {
                    width: 98%;
                    height: 42px;
                    border: 1px solid black;
                    border-radius: 5px;
                    text-align: center;
                    padding: 2%;
                    margin-left: 5%;
                    margin-bottom: 35px;
                }

                #formx select {
                    width: 98%;
                    height: 42px;
                    border: 1px solid black;
                    border-radius: 5px;
                    text-align: center;
                    padding: 0 2%;
                    margin-left: 5%;
                    margin-bottom: 35px;

                }

                #formx label {
                    color: black;
                    font-size: medium;
                    margin: 1% 5%;
                }

                .sub2 {
                    width: 38%;
                    background-color: lightblue;
                    color: #000;
                    border-radius: 5px;
                    height: 40px;
                    padding: 1% 2%;
                    margin-left: -66%;
                    margin-top: 234px;
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

    <script src="script.js"></script>
</body>

</html>