<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_03"] == false) {
    header("location: log.php");
}
error_reporting(0);

$em = $_SESSION["email2"];

$data = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em' ;");
$data2 = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em' ;");
$data5 = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em' ;");

$nm = $_SESSION['nm'];
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
    <link rel="icon" href="loge.png">
    <title>Feedback</title>
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
                        <i class="uil uil-comment-alt-download" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Feedback</span>
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

            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""></a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-comment-alt-download"></i>
                    <span class="text">Feedback Form</span>
                </div>
            </div>

        </div>

        <div>

            <form action="emp_feedback_load.php" method="POST" id="formx" enctype="multipart/form-data">

                <div class="hx1">

                    <label for="name">Name</label>
                    <?php

                    if ($total2 = mysqli_num_rows($data2) > 0) {
                        $im = 0;

                        while ($result2 = mysqli_fetch_array($data2)) {
                    ?>
                            <input value="<?php echo $result2['name']; ?>" name="name" readonly="readonly">
                    <?php
                            $im++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>
                    <label for="deptm">Department</label>
                    <?php

                    if ($total = mysqli_num_rows($data) > 0) {
                        $i = 0;

                        while ($result = mysqli_fetch_array($data)) {
                    ?>
                            <input value="<?php echo $result['deptm']; ?>" name="deptm" readonly="readonly">
                    <?php
                            $i++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>

                    <?php

                    if ($total5 = mysqli_num_rows($data5) > 0) {
                        $it = 0;

                        while ($result5 = mysqli_fetch_array($data5)) {
                    ?>
                            <input value="<?php echo $result5['man']; ?>" name="man" style="display: none;" readonly="readonly">
                    <?php
                            $it++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>

                    </select>
                    <label for="problem">Problems</label>
                    <select name="problem" id="n3" required>
                        <option value="">SELECT</option>
                        <option value="Salary Issue">Salary Issue</option>
                        <option value="Technical Issue">Technical Issue</option>
                        <option value="Issue related task">Issue related task</option>
                        <option value="other">other</option>
                    </select>
                    <label for="desc">Description</label>
                    <input type="text" name="desc" id="n45" placeholder="Description" required>
                </div>

                <button class="sub2" type="submit" required>Submit</button>
            </form>


    </section>
    <style>
        .top img {
            width: 45px;
            height: 45px;
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

        a {
            margin-top: -3px;
            color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
            text-decoration: underline;
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
            margin-top: -33px;
            margin-bottom: -40px;
            margin-left: 15px;
        }


        nav .logo-image img {
            width: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
        .menu-items li a {
            margin-left: -2px;
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

        .h1 #n45 {
            height: 27%;
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
            height: 50px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 2%;
            margin-left: 1%;
            margin-bottom: 15px;
        }

        #formx select {
            width: 98%;
            height: 50px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
            padding: 2%;
            margin-left: 1%;
            margin-bottom: 15px;
            background-color: transparent;

        }

        #formx label {
            color: black;
            font-size: medium;
            margin: 2%;
        }


        .sub2 {
            width: 25%;
            background-color: lightblue;
            color: #000;
            border-radius: 5px;
            height: 40px;
            padding: 1% 2%;
            margin-left: -38%;
            margin-top: 382px;
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
    </style>
    </div>


    </section>
</body>

</html>