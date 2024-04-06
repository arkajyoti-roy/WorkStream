<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: ../log.php");
}
// error_reporting(0);
$email2 = $_SESSION["email2"];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email2';");

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];
$deptm = $_SESSION['deptmy'];
$data2 = mysqli_query($conn, "SELECT * FROM `leave` WHERE email = '$email2';");
$data3 = mysqli_query($conn, "SELECT * FROM staff WHERE `name`='$nm';");
$data4 = mysqli_query($conn, "SELECT * FROM details WHERE `name`='$nm';");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="logo.png">
    <title>Profile</title>
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

            <a href="man_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-telegram-alt"></i>
                    <span class="text">Profile</span>
                </div>
            </div>
        </div>


        <table class="table" id="good">

            <?php
            if ($total3 = mysqli_num_rows($data3) > 0) {
                $k = 0;

                while ($result3 = mysqli_fetch_array($data3)) {
            ?>
                    <tr class="bg-dark">
                        <th>Employee Id</th>
                        <td> <?php echo $result3['empid']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Employee Name</th>
                        <td> <?php echo $result3['name']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Department Id</th>
                        <td> <?php echo $result3['deptm']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Role</th>
                        <td> <?php echo $result3['man']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Email</th>
                        <td> <?php echo $result3['email']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Phone</th>
                        <td> <?php echo $result3['phone']; ?> </td>
                    </tr>
            <?php
                    $k++;
                }
            } else {
                echo "no FoUnD";
            }
            ?>


            <?php
            if ($total4 = mysqli_num_rows($data4) > 0) {
                $l = 0;

                while ($result4 = mysqli_fetch_array($data4)) {
            ?>
                    <tr class="bg-dark">
                        <th>Qualification</th>
                        <td> <?php echo $result4['quali']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Work Experience</th>
                        <td> <?php echo $result4['work_ex']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Current Address</th>
                        <td> <?php echo $result4['cur_add']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Current Address Line</th>
                        <td> <?php echo $result4['cur_city']; ?>,<?php echo $result4['cur_state']; ?>,<?php echo $result4['cur_zip']; ?> </td>
                    </tr>

                    <tr class="bg-dark">
                        <th>Permanent Address</th>
                        <td> <?php echo $result4['per_add']; ?> </td>
                    </tr>
                    <tr class="bg-dark">
                        <th>Permanent Address Line</th>
                        <td> <?php echo $result4['per_city']; ?>,<?php echo $result4['per_state']; ?>,<?php echo $result4['per_zip']; ?> </td>
                    </tr>

            <?php
                    $l++;
                }
            } else {
                echo "no FoUnD";
            }
            ?>



        </table>
        <a href="man_personal_edit.php">

            <button class="sub2" type="submit" required> <i class="uil uil-edit"></i> &nbsp; Edit</button>
        </a>



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

            li {
                margin-left: -33px;
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


            .sub2 {
                width: 76px;
                height: 30px;
                background-color: #3399ff;
                color: #000;
                border-radius: 5px;
                margin-left: 0.51%;
                margin-top: 2px;
                cursor: pointer;
                border-radius: 6px;
                margin-bottom: -90%;
            }
        </style>


    </section>
</body>

</html>