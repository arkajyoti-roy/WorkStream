<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: ../log.php");
}
// error_reporting(0);

$nm = $_SESSION['nm'];
$data = mysqli_query($conn, "SELECT * FROM `dept`;");
$data2 = mysqli_query($conn, "SELECT * FROM `staff`;");
$data3 = mysqli_query($conn, "SELECT * FROM `staff` WHERE id = $j2;");

$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="logo.png">
    <title>Login First Time</title>
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
                        <i class="uil uil-users-alt" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Employees</span>
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
                        <i class="uil uil-usd-square"></i>
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
            <br><br><br>

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
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <a href="man_notice_from_admin.php"> <i style="font-size: 25px;" class="uil uil-bell"></i></a>
            <div class="nm">

                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Manager</h5>
            </div>

            <a href="man_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>


        <div class="dash-content">
            <div class="overview" style="display: block;">
                <div class="title">

                    <i class="uil uil-rope-way"></i>
                    <span class="text">Edit Here</span>
                </div>

            </div>
            <br>



            <?php
            if ($total3 = mysqli_num_rows($data3) > 0) {
                $k = 0;

                while ($result3 = mysqli_fetch_array($data3)) {


            ?>



                    <form action="staff_edit_load.php" method="POST" id="formx" enctype="multipart/form-data">


                        <div class="hx1">
                            <input name="i1" style="display: none;" type="text" value="<?php echo $result3['id']; ?>">


                            <label for="name">Name</label>
                            <input name="i2" type="text" value="<?php echo $result3['name']; ?>">

                            <label for="dept">Department</label>
                            <select name="i3" id="n3" require>
                                <option value="<?php echo $result3['deptm']; ?>"><?php echo $result3['deptm']; ?></option>

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

                            <label for="phone">Phone No.</label>
                            <input name="i4" type="text" value="<?php echo $result3['phone']; ?>">


                            <label for="email">Email</label>
                            <input name="i5" type="text" value="<?php echo $result3['email']; ?>">

                            <label for="pass">Password</label>
                            <input name="i6" type="text" value="<?php echo $result3['pass']; ?>">

                        </div>
                        <button class="sub2" type="submit" require>Save</button>
                    </form>


            <?php
                    $k++;
                }
            } else {
                echo "no FoUnD";
            }
            ?>



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

        .hx1 {
            display: flexbox;
            width: 48%;
        }

        .hx2 {
            display: flexbox;
            width: 48%;
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

        #formx select {
            width: 98%;
            height: 37px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            /* padding: 2%; */
            margin-left: 1%;
            margin-bottom: 35px;
            background-color: transparent;

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
            /* margin-right: 14%; */
            margin-top: 294px;
            cursor: pointer;
            /* display: block; */
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


    </section>
</body>

</html>