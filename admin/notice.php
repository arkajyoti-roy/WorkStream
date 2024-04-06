<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$data = mysqli_query($conn, "SELECT * FROM staff;");
$data2 = mysqli_query($conn, "SELECT * FROM notice WHERE ford='admin' ORDER BY id DESC;");
$data3 = mysqli_query($conn, "SELECT * FROM dept;");
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
    <title>Notice</title>

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

            <!-- <span class="logo_name">Arka</span> -->
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
                        <i class="uil uil-bell" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Add Notice</span>
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


                <input type="text" id="search_bar" name="search_bar" readonly style="border: #fff; ">

            </div>
            <div class="nm">
                <h4 class="re"> <?php echo $nx; ?></h4>
                <h5 class="er">Admin</h5>
            </div>

            <img src="1.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-envelope-add"></i>
                    <span class="text">Add Notice</span>
                </div>
            </div>
        </div>


        <div id="fp">
            <form action="" method="POST">
                <label for="depx">Select Department</label>
                <select name="depx" id="bigo" style="color: var(--text-color);  border: 1px solid black; border-radius: 4px;" required>
                    <option value="">select</option>
                    <?php
                    if ($total3 = mysqli_num_rows($data3) > 0) {
                        $p = 0;

                        while ($result3 = mysqli_fetch_array($data3)) {
                    ?>
                            <option value="<?php echo $result3['deptm']; ?>"><?php echo $result3['deptm']; ?></option>
                    <?php
                            $p++;
                        }
                    } else {
                        echo "no FoUnD";
                    }
                    ?>
                </select>
                <input type="text" id="forest" name="deptm" readonly="readonly" style="display: none;  border: 1px solid black; border-radius: 4px;">
                <button id="fish" style="display: none;">OK</button>
            </form>




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
            </script>


            <form action="notice_load.php" method="POST" style="color: var(--text-color);">
                <label for="subject">Subject</label>
                <input type="text" name="subject" placeholder="Enter the subject" required style=" border: 1px solid black; border-radius: 4px;">
                <label for="details">Detail</label>
                <input type="text" name="details" placeholder="Enter the details" required style=" border: 1px solid black; border-radius: 4px;">

                <?php
                $dep = $_POST['deptm'];
                ?>

                <label for="deptmx">Department</label>

                <input type="text" name="deptmx" placeholder="Enter the details" required value="<?php echo $dep ?>" readonly="readonly" style=" border: 1px solid black; border-radius: 4px;">

                <label for="user">Select Employee</label>
                <select name="user" id="n3" required style="background-color: transparent;  border: 1px solid black; border-radius: 4px;">
                    <option value="all">All</option>

                    <?php
                    $options =  mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$dep';");
                    if ($total21 = mysqli_num_rows($options) > 0) {
                        $jp = 0;

                        while ($result21 = mysqli_fetch_array($options)) {
                    ?> <option value="<?php echo $result21['name']; ?>" id="jk"><?php echo $result21['name']; ?></option>
                    <?php
                            $jp++;
                        }
                    } else {
                        echo "no FoUnD";
                    }
                    ?>
                </select>

                <br> <br>

                <input type="submit" class="" value="Add notice" style="background-color: skyblue; cursor:pointer; font-size: 16px; color: var(--text-color);">
            </form>
        </div>


        <div class="dash-content" id="con">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-envelope-edit"></i>
                    <span class="text">Manage Notice</span>
                </div>
            </div>
        </div>


        <div class="mg_dept">

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">

                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>User</th>
                        <th>Date</th>
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

                                <tr style="text-align: center;" id="<?php echo $result2['subject']; ?>">
                                    <td> <?php echo $result2['id']; ?> </td>
                                    <td> <?php echo $result2['subject']; ?> </td>
                                    <td> <?php echo $result2['details']; ?> </td>
                                    <td> <?php echo $result2['deptm']; ?> </td>
                                    <td> <?php echo $result2['man']; ?> </td>
                                    <td> <?php echo $result2['user']; ?> </td>
                                    <td> <?php echo date('d-M-Y || H:i', strtotime($result2['dt'])); ?> </td>
                                    <td>
                                        <form action="notice_edit.php" method="post">
                                            <input type="text" name="j2" style="display: none;" value="<?php echo $result2['id']; ?>">
                                            <button class="vibrant-y">Edit</button>
                                        </form>
                                        <form action="notice_delete.php" method="POST">
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
                </tbody>
            </table>
        </div>

        <style>
            #con {
                margin-top: -75px;
            }

            .menu-items li a {
                margin-left: 30px;
                display: flex;
                align-items: center;
                height: 50px;
                text-decoration: none;
                position: relative;
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
                margin-left: -33px;
            }

            #fp {
                display: flexbox;
                width: 68%;
                height: 56%;
            }

            #fp input {
                width: 96%;
                margin-bottom: 2%;
                border-radius: 4px;
                padding: 0.5px;
                height: 43px;
            }

            #fp select {
                width: 96%;
                margin-bottom: 2%;
                border-radius: 4px;
                padding: 0.5px;
                height: 43px;
            }

            #fp label {
                width: 96%;
                text-align: justify;
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