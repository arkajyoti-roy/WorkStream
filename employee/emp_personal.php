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

$data3 = mysqli_query($conn, "SELECT * FROM staff WHERE `name`='$nm';");
$data4 = mysqli_query($conn, "SELECT * FROM details WHERE `name`='$nm';");

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
                <!-- <i class="uil uil-search"></i> -->
                <input type="text" style="border: #fff;" readonly>
            </div>

            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>

            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-airplay" style="background-color:#0E4CF4;"></i>
                    <span class="text">Profile</span>
                </div>
            </div>
        </div>


        <!-- <div id="formx" style="background-color: blue;"> -->

        <table class="table" id="good">


            <!-- <tbody class="table-group-divider"> -->

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

            <!-- </tbody> -->


        </table>
        <a href="emp_personal_edit.php">
            <button class="sub2" type="submit" required>Edit</button>
        </a>

        <!-- </div> -->

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
            margin-top: -33px;
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
                color: gray;
            }

            table {
                border: solid navy 1px;
                margin-left: 4%;
                border-radius: 8px;
                padding: 1%;
                width: 80%;
            }

            th {
                padding: 0.5% 2%;
                border: solid navy 1px;
                border-radius: 4px;
                text-align: left;
                margin: 1% 0;
            }

            td {
                padding: 0.5% 2%;
                border: solid navy 1px;
                border-radius: 4px;
                text-align: left;
                margin: 1% 0;
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
                padding: 0 2%;
                margin-left: 1%;
                margin-bottom: 35px;

            }

            .sub2 {
                width: 76px;
                height: 30px;
                background-color: #3399ff;
                color: #000;
                border-radius: 5px;
                margin-left: 39%;
                margin-top: 2px;
                cursor: pointer;
                border-radius: 60px;
                margin-bottom: -90%;
            }

            #formx h4 {
                cursor: pointer;
                display: flexbox;
                margin: auto;
            }

            :root {
                /* ===== Colors ===== */
                /* --primary-color: #0E4BF1; */
                --primary-color: none --panel-color: #FFF;
                --text-color: #000;
                --black-light-color: #707070;
                --border-color: #e6e5e5;
                --toggle-color: #DDD;
                --box1-color: #4DA3FF;
                --box2-color: #FFE6AC;
                --box3-color: #E7D1FC;
                --title-icon-color: #fff;

                /* ====== Transition ====== */
                --tran-05: all 0.5s ease;
                --tran-03: all 0.3s ease;
                --tran-03: all 0.2s ease;
            }
        </style>

    </section>
</body>

</html>