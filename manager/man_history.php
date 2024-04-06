<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: log.php");
}
// error_reporting(0);
$em = $_SESSION["email2"];
$deptm = $_SESSION["deptmy"];
$nm = $_SESSION['nm'];
$img = $_SESSION['img'];
$deptm = $_SESSION['deptmy'];


$data = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em';");
$data3 = mysqli_query($conn, "SELECT * FROM complete WHERE `submittedby`='$deptm'  ORDER BY id DESC;");
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
    <link rel="icon" href="logo.png">
    <title>Task History</title>

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
                        <i class="uil uil-check-square" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Task Completed</span>
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
                        <i class="uil uil-telegram-alt"></i>
                        <span class="link-name">Apply for Leave</span>
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

            <ul class="logout-mode">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <!-- <div class="mode-toggle">
                    <span class="switch"></span>
                </div> -->
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">

                <input type="text" readonly style="border-color: #fff;" required>

            </div>

            <a href="man_seen.php" class="mk" id="fl"> <i style="font-size: 25px;" class="uil uil-bell"></i><span id="DF3"><?php echo mysqli_num_rows($data30); ?></span></a>
            <div class="nm">

                <h4 class="re"> <?php echo $nm ?></h4>
                <h4 class="er">Manager</h4>
            </div>

            <a href="man_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-file-edit-alt"></i>
                    <span class="text">Task Completed</span>
                </div>
            </div>
        </div>


        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>

                <tr style="text-align: center;">

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

                            <tr class="" style="text-align: center;">
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




            .menu-items li a {
                margin-left: 30px;
                display: flex;
                align-items: center;
                height: 50px;
                text-decoration: none;
                position: relative;
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
                display: none;
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

            

            #btn {
                height: 30px;
                width: 9%;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                margin-left: 176px;
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


    </section>
    <script src="script.js"></script>
</body>

</html>