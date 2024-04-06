<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$j2 = $_POST['j2'];

$deptm = $_SESSION["deptmy"];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE `deptm`='$deptm';");
$data2 = mysqli_query($conn, "SELECT * FROM notice;");
$data3 = mysqli_query($conn, "SELECT * FROM notice WHERE id = $j2;");
$data30 = mysqli_query($conn, "SELECT * FROM notice WHERE deptm= '$deptm' AND seen='not_seen' AND man='Manager';");
$data30 = mysqli_query($conn, "SELECT * FROM notice WHERE deptm= '$deptm' AND seen='not_seen' AND man='Manager';");

$email2 = $_SESSION["email2"];
$dataxc = mysqli_query($conn, "SELECT * FROM staff WHERE `email`='$email2';");
$nxm = mysqli_fetch_array($dataxc);
$nm = $nxm['name'];
$nm1 = $_SESSION['nm'];
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
    <link rel="icon" href="logo.png">
    <title>Edit Notice</title>
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
                        <i class="uil uil-telegram-alt"></i>
                        <span class="link-name">Apply for Leave</span>
                    </a></li>
                <li><a href="man_notice.php">
                        <i style="color: blue;" class="uil uil-bell"></i></i>
                        <span class="link-name" style="color: blue;">Notice</span>
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
                <input type="text" style="border: #fff;" readonly>
            </div>
            <a href="man_seen.php" class="mk" id="fl"> <i style="font-size: 25px;" class="uil uil-bell"></i><span id="DF3"><?php echo mysqli_num_rows($data30); ?></span></a>
            <div class="nm">

                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Manager</h5>
            </div>

            <a href="man_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""> </a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Edit Notice</span>
                </div>
            </div>
        </div>

        <div id="fp">
            <?php

            if ($total3 = mysqli_num_rows($data3) > 0) {
                $k = 0;

                while ($result3 = mysqli_fetch_array($data3)) {
            ?>
                    <form action="man_notice_edit_load.php" method="POST">
                        <input name="i1" style="display: none;" type="text" value="<?php echo $result3['id']; ?>">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" value="<?php echo $result3['subject']; ?>" placeholder="Enter the subject" required>
                        <label for="details">Detail</label>
                        <input type="text" name="details" value="<?php echo $result3['details']; ?>" placeholder="Enter the details" required>
                        <label for="user">Select User</label>
                        <select name="user" value="" id="n3">
                            <option value="<?php echo $result3['user']; ?>"><?php echo $result3['user']; ?></option>
                            <option value="all">All</option>
                            <?php

                            if ($total = mysqli_num_rows($data) > 0) {
                                $i = 0;

                                while ($result = mysqli_fetch_array($data)) {
                            ?>
                                    <option value="<?php echo $result['name']; ?>"><?php echo $result['name']; ?></option>
                            <?php
                                    $i++;
                                }
                            } else {
                                // echo "no FoUnD";
                            }
                            ?>
                        </select><br> <br>
                        <input type="submit" class="" value="Update Notice" style="background-color: skyblue; cursor:pointer; font-size: 16px;">

                    </form>
            <?php
                    $k++;
                }
            } else {
                // echo "no FoUnD";
            }
            ?>
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
                background-color: transparent;
            }

            #fp label {
                width: 96%;
                /* margin-bottom: 2%; */
                text-align: justify;
            }
        </style>







    </section>
</body>

</html>