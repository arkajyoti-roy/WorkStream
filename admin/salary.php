<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$email = $_SESSION["email"];


$data = mysqli_query($conn, "SELECT * FROM dept;");
$data2 = mysqli_query($conn, "SELECT * FROM admin_login WHERE `email`='$email';");
$nxm = mysqli_fetch_array($data2);
$nx = $nxm['name'];
$data3 = mysqli_query($conn, "SELECT * FROM salary ORDER BY id DESC;");

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


        <h3 style=" margin-left: 25px; margin-bottom: 10px; color: var(--text-color);">Create Slip</h3>

        <div id="alt0">





            <form action="" method="post" id="sf" style="color: var(--text-color);">
                <label for="deptm">Department</label>
                <select name="deptm" id="bigo" style="color: var(--text-color);  border: 1px solid black; border-radius: 4px;" required>
                    <option value="">select</option>
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
                        echo "no FoUnD";
                    }
                    ?>
                </select>

                <input type="text" name="selectedValue" id="forest" required style="display: none;">



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                <script>
                    $(document).ready(function() {
                        $('#bigo').change(function() {

                            var red = document.getElementById('bigo').value;

                            var d = document.getElementById('forest');
                            d.value = red;


                        });
                    });
                    $(document).ready(function() {
                        $('#bigo').change(function() {

                            $('#fish').click();


                        });


                    });

                    $(document).ready(function() {
                        ($('#btn')).click(function() {

                            var a2 = document.getElementById('a2').value = '0';
                            var a3 = document.getElementById('a3').value = '0';

                        });
                    });

                    $(document).ready(function() {
                        ($('#alt3')).change(function() {
                            var f1 = document.getElementById('f1').value;
                            var f2 = document.getElementById('f2').value;
                            var a1 = document.getElementById('a1').value;
                            var a2 = document.getElementById('a2').value;
                            var a3 = document.getElementById('a3').value;
                            var a4 = document.getElementById('a4');
                            var g1 = parseInt(f1);
                            var g2 = parseInt(f2);
                            var b1 = parseInt(a1);
                            var b2 = parseInt(a2);
                            var b3 = parseInt(a3);
                            var sun = (b1 + b2 - b3);
                            var fof = sun.toString();
                            a4.value = fof;
                        });
                    });
                </script>





                <button id="fish" style="display: none;">fish</button>
            </form>
        </div>




        <div id="alt1" style="color: var(--text-color);">

            <form action="salary_load.php" method="POST" class="m1">

                <label for="name">Employee</label>
                <select name="name" id="n3" style=" border: 1px solid black; border-radius: 4px;" required>
                    <?php
                    $options = array();

                    $selectedValue = $_POST['selectedValue'];

                    $options =  mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$selectedValue';");


                    if ($total2 = mysqli_num_rows($options) > 0) {
                        $j = 0;

                        while ($result2 = mysqli_fetch_array($options)) {
                    ?>
                            <option value="<?php echo $result2['name']; ?>" id="jk"><?php echo $result2['name']; ?></option>
                    <?php
                            $j++;
                        }
                    } else {
                        echo "no FoUnD";
                    }
                    ?>
                </select>



                <?php

                $orange = array();

                $orange =  mysqli_query($conn, "SELECT * FROM dept WHERE deptm='$selectedValue';");


                if ($tree = mysqli_num_rows($orange) > 0) {
                    $e = 0;

                    while ($gach = mysqli_fetch_array($orange)) {
                ?>


                        <input type="text" name="selectedValue2" id="forest2" value="<?php echo $gach['deptm']; ?>" readonly="readonly">
                <?php
                        $e++;
                    }
                } else {
                    echo "no FoUnD";
                }
                ?>


                <label for="year">Year</label>
                <input type="number" name="year" min="2018" max="2050" value="2023" step="1" required style=" border: 1px solid black; border-radius: 4px;">
                <label for="month">Month</label>
                <select name="month" id="" style=" border: 1px solid black; border-radius: 4px;" required>
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
                </select>
                <buttom id="btn" onclick="katla();">Create</buttom>
                <script>
                    function katla() {
                        document.getElementById("alt2").style.display = "block";
                        document.getElementById("alt3").style.display = "block";
                    }
                </script>
        </div>


        <br>
        <div id="alt2" style="color: var(--text-color);">
            <label for="allowance">Allowance</label>
            <select name="allowance" id="" required style=" border: 1px solid black; border-radius: 4px;">
                <option value="Housing">Housing</option>
                <option value="Medical Allowance">Medical Allowance</option>
                <option value="Travel Allowance">Travel Allowance</option>
                <option value="Overtime">Overtime</option>
            </select>
            <input type="text" name="allo_amount" required id="f1" style=" border: 1px solid black; border-radius: 4px;">
            <label for="deduction">Deduction</label>
            <select name="deduction" id="" required style=" border: 1px solid black; border-radius: 4px;">
                <option value="Monthly Tax Deduction">Monthly Tax Deduction</option>
                <option value="Income">Income</option>
                <option value="Other">Other</option>
            </select>
            <input type="text" name="ded_amount" required id="f2" style=" border: 1px solid black; border-radius: 4px;">
        </div>

        <div id="alt3" style="color: var(--text-color);">
            <h3 style="margin-bottom: 10px;">Summary</h3>
            <label for="basic">Basic</label>
            <input type="text" id="a1" name="basic" required style=" border: 1px solid black; border-radius: 4px;">
            <label for="total_allo">Total Allowance</label>
            <input type="text" name="total_allo" id="a2" required style=" border: 1px solid black; border-radius: 4px;">
            <label for="total_ded">Total Deduction</label>
            <input type="text" id="a3" name="total_ded" required style=" border: 1px solid black; border-radius: 4px;">
            <label for="net_salary">Net Salary</label>
            <input type="text" id="a4" name="net_salary" required readonly="readonly" style=" border: 1px solid black; border-radius: 4px;">
            <label for="mode">Payment Mode</label>
            <select name="mode" id="" required style=" border: 1px solid black; border-radius: 4px;">
                <option value="UPI">UPI</option>
                <option value="RTGS">RTGS</option>
                <option value="NEFT">NEFT</option>
                <option value="IMPS">IMPS</option>
                <option value="e-Rupee">e-Rupee</option>
                <option value="Cheque">Cheque</option>
            </select>
            <button id="m2" type="submit">Create Payslip</button>

        </div>
        </form>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-analysis"></i>
                    <span class="text">Salary Stats</span>
                </div>
            </div>
        </div>


        <a href="salary_stat.php">

            <button id="btnxc" type="submit">View Details</button>
        </a>




        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">Salary Paid</span>
                </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Month & Year</th>
                            <th>Basic</th>
                            <th>Allowance & Deduction</th>
                            <th>Net Salary</th>
                            <th>Payment Mode</th>
                        </tr>
                    </thead>
                    <tbody>

                        <div class="">
                            <?php
                            if ($total3 = mysqli_num_rows($data3) > 0) {
                                $k = 0;

                                while ($result3 = mysqli_fetch_array($data3)) {
                            ?>

                                    <tr style="text-align: center;" id="<?php echo $result3['name']; ?>">
                                        <td> <?php echo $result3['id']; ?> </td>
                                        <td> <?php echo $result3['deptm']; ?> </td>
                                        <td> <?php echo $result3['name']; ?> </td>
                                        <td> <?php echo $result3['month']; ?> & <?php echo $result3['year']; ?> </td>
                                        <td>₹<?php echo $result3['basic']; ?> </td>
                                        <td>₹<?php echo $result3['total_allo']; ?> & ₹<?php echo $result3['total_ded']; ?> </td>
                                        <td>₹<?php echo $result3['net_salary']; ?> </td>
                                        <td> Paid through <?php echo $result3['mode']; ?> </td>

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
            .logout-mode11 {
                margin-top: -24px;
                border-top: 1px solid var(--border-color);
                padding-top: 10px;
            }
            .dashboard .dash-content {
                padding-top: 1px;
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
                margin-left: -1px;
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




            .vibrant-y {
                background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
                border: none;
                border-radius: 4px;
                width: 58px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            #sf {
                display: inline-flex;

            }



            #sf select {
                display: flexbox;
                width: 98%;
                height: 30px;
                background-color: transparent;
                margin: 0 0.5%;

            }

            #alt0 {
                width: 98%;
                margin-left: 29px;
                margin-bottom: 12px;
            }

            #alt0 input {
                display: flexbox;
                width: 295.5px;
                height: 30px;
                margin: 0 0.5%;

            }

            #alt0 select {
                display: flexbox;
                width: 295.5px;
                height: 30px;
                background-color: transparent;
                margin: 0 0.5%;

            }



            #alt0 label {
                font-size: medium;
                margin: 0 0.5%;

            }

            #alt1 {
                width: 98%;
                margin-left: 25px;
                margin-bottom: 12px;
            }

            #alt1 input {
                display: flexbox;
                width: 15%;
                height: 30px;
                margin: 0 0.5%;

            }

            #alt1 select {
                display: flexbox;
                width: 180px;
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
                text-align: center;
                padding: 0.5% 2%;
                cursor: pointer;
                display: flexbox;
                margin-left: 0%;
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

            .df {
                margin-bottom: -14px;
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