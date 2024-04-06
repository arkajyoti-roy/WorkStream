<?php
include '../conn.php';

session_start();
if ($_SESSION["new_session"] == false) {
    header("location: ../log.php");
}
error_reporting(0);

$j2 = $_POST['j2'];


$data = mysqli_query($conn, "SELECT * FROM staff;");
$data2 = mysqli_query($conn, "SELECT * FROM notice;");
$data3 = mysqli_query($conn, "SELECT * FROM notice WHERE id = $j2;");
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

            <img src="1.jpg" alt="">
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
                    <form action="notice_edit_load.php" method="POST">
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
                        <input type="submit" class="" value="Add notice" style="background-color: skyblue; cursor:pointer; font-size: 16px;">

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
            .re {
                font-size: 18px;
                color: #000;
                display: block;
            }

            .er {
                font-size: 12px;
                color: navy;
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
                text-align: justify;
            }
        </style>




        <script src="script.js"></script>
        <script>
            const body = document.querySelector("body")
            const logoname = document.querySelector(".logo-name")

            modeToggle = body.querySelector(".mode-toggle");
            sidebar = body.querySelector("nav");
            sidebarToggle = body.querySelector(".sidebar-toggle");

            let getMode = localStorage.getItem("mode");
            if (getMode && getMode === "dark") {
                body.classList.toggle("dark");
            }

            let getStatus = localStorage.getItem("status");
            if (getStatus && getStatus === "close") {
                sidebar.classList.toggle("close");
            }


            modeToggle.addEventListener("click", () => {
                body.classList.toggle("dark");
                if (body.classList.contains("dark")) {
                    localStorage.setItem("mode", "dark");
                } else {
                    localStorage.setItem("mode", "light");
                }
            });

            sidebarToggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
                if (sidebar.classList.contains("close")) {
                    localStorage.setItem("status", "close");
                } else {
                    localStorage.setItem("status", "open");
                }
            })
        </script>


    </section>
</body>

</html>