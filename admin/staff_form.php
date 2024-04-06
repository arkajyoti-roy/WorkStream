<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);


$data = mysqli_query($conn, "SELECT * FROM dept;");
$data2 = mysqli_query($conn, "SELECT * FROM staff;");
$data3 = mysqli_query($conn, "SELECT * FROM staff;");
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
    <title>Registration</title>
    <link rel="icon" href="logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <i class="uil uil-users-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Staff</span>
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
                <input type="text" style="border: #fff;" readonly>
            </div>
            <div class="nm">
                <h4 class="re"> <?php echo $nx; ?></h4>
                <h5 class="er">Admin</h5>
            </div>
            <style>
                .re {
                    font-size: 18px;
                    color: #000;
                    display: block;
                }

                .er {
                    font-size: 12px;
                    color: navy;
                }
            </style>

            <img src="1.jpg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview" style="display: block;">
                <div class="title">
                    <i class="uil uil-user-plus"></i>
                    <span class="text">Register Here</span>
                </div>

            </div>
            <br>


            <form action="staff_load.php" method="POST" id="formx" readonly enctype="multipart/form-data">


                <div class="hx1">
                    <label for="empid">Employee ID</label>
                    <input type="text" placeholder="Enter the Employee ID" name="empid">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="n1" placeholder="Enter employee name" required>
                    <label for="img">Uplode Image</label>
                    <input type="file" name="img" id="n2" required accept=".jpg,.png,.jpeg">
                    <label for="dept">Department</label>
                    <select name="deptm" id="n3" style="background-color: transparent;" required>
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
                </div>

                <div class="hx2">
                    <label for="man">Designation</label>
                    <div style="display: block;">

                        <select name="man" id="corrupt">
                            <option value="Intern">Intern</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Employee">Employee</option>
                            <option value="Manager">Manager</option>
                        </select>
                        <input type="date" data-arka="er" name="du" style="width: 48%;" id="result" required>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById("result").min = today;
                        </script>
                    </div>
                    <input type="text" name="subject" id="" value="Welcome to WorkStream" style="display: none;">
                    <label for="phone">Phone No.</label>
                    <input type="tel" name="phone" id="n4" placeholder="Enter your phone no." required>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="n5" placeholder="Enter the email" required>
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="n6" placeholder="Enter the password" required>
                </div>
                <button class="sub2" type="submit" require>Submit</button>
            </form>


    </section>

    <style>
        [data-arka="er"] {
            width: 48%;
            height: 37px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 0 2%;
            margin-left: 1%;
            margin-bottom: 35px;
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

        .hx2 select {
            width: 48%;
            height: 37px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 0 2%;
            margin-left: 1%;
            margin-bottom: 35px;
            background-color: white;
        }

        .hx1 select {
            width: 98%;
            height: 37px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 0 2%;
            margin-left: 1%;
            margin-bottom: 35px;
        }



        #formx {
            background-color: #fff;
            border-radius: 7px;
            width: 80%;
            height: 515px;
            position: fixed;
            opacity: 0.9;
            padding: 0.5%;
            margin-left: 1%;
            display: flex;
        }

        #formx input {
            width: 98%;
            height: 37px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 2%;
            margin-left: 1%;
            margin-bottom: 35px;
        }


        #formx label {
            color: black;
            font-size: medium;
            margin: 2%;
        }

        .sub2 {
            width: 38%;
            background-color: lightblue;
            color: #000;
            border-radius: 5px;
            height: 40px;
            padding: 1% 2%;
            margin-left: -66%;
            margin-top: 385px;
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
    <script src="script.js"></script>

    <script>
        $(document).ready(function() {
            $('#corrupt').change(function() {
                var selectedValue = $(this).val(); // Get the selected value
                var inputElement = document.getElementById('result'); // Replace 'yourInputId' with the actual ID of your input element

                // Apply read-only status based on the selected value
                if (selectedValue === 'Employee' || selectedValue === 'Manager') {
                    inputElement.readOnly = true;
                } else {
                    inputElement.readOnly = false;
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>