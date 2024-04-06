<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: log.php");
}
error_reporting(0);


$deptm = $_POST['deptm'];
$_SESSION["m102"] = $deptm;

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];
$deptm = $_SESSION['deptmy'];

$data = mysqli_query($conn, "SELECT * FROM man_task WHERE deptm='$deptm' AND `upload_date` = '1000-01-01' ;");
$data2 = mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$deptm';");
$data3 = mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$deptm';");
$data4 = mysqli_query($conn, "SELECT * FROM staff WHERE deptm='$deptm';");
$data5 = mysqli_query($conn, "SELECT * FROM leader WHERE leader='leader' AND deptm='$deptm' ORDER BY id DESC LIMIT 1;");
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

    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <title>Add Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                        <i class="uil uil-edit" class="uil uil-check-square" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Task</span>
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
            <br><br>
            <br>

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

                <input type="text" readonly style="border: #fff;" required>

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
                    <i class="uil uil-file-plus-alt"></i>
                    <span class="text">New Task</span>
                </div>
            </div>
        </div>
        <form action="man_task_load.php" method="POST" class="m1" id="formx">
            <div class="a1">

                <input type="text" value="<?php echo $deptm ?>" style="display:none" name="deptm">
                <label for="p_name">Project Name</label>
                <select name="p_name" id="">

                    <?php
                    if ($total96 = mysqli_num_rows($data) > 0) {
                        $l = 0;

                        while ($result96 = mysqli_fetch_array($data)) {
                    ?>
                            <option value="<?php echo $result96['p_name']; ?>"><?php echo $result96['p_name']; ?></option>
                    <?php
                            $l++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>





                </select>

                <label for="starting_date">Starting Date</label>
                <input type="date" name="starting_date" required id="myDate">
                <script>
                    var today = new Date().toISOString().split('T')[0];
                    document.getElementById("myDate").min = today;
                </script>
                <label for="leader">Project Leader</label>
                <select name="leader" id="" required>
                    <?php
                    if ($total3 = mysqli_num_rows($data3) > 0) {
                        $k = 0;

                        while ($result3 = mysqli_fetch_array($data3)) {
                    ?>
                            <option value="<?php echo $result3['name']; ?>"><?php echo $result3['name']; ?></option>
                    <?php
                            $k++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>
                </select>
                <label for="desc">Description</label>
                <input type="text" name="desc" class="slq" placeholder="Enter the project description" style="height: 100px; width: 199%" required>
            </div>

            <div class="a2">
                <label for="status">Status</label>
                <select name="status" id="" required>
                    <option value="pending">Pending</option>
                    <option value="Re-Evaluated">Re-Evaluated</option>
                    <option value="Mid Update">Mid Update</option>
                </select>
                <label for="ending_date">Ending Date</label>
                <input type="date" name="ending_date" required id="myDate2">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {
                        ($('#myDate')).change(function() {

                            var def = document.getElementById("myDate").value;
                            document.getElementById("myDate2").min = def;
                        });
                    });
                </script>
                <label for="countries">Team Members</label>
                <select name="countries[]" id="countries" multiple>
                    <?php
                    if ($total4 = mysqli_num_rows($data4) > 0) {
                        $h = 0;

                        while ($result4 = mysqli_fetch_array($data4)) {
                    ?>
                            <option value="<?php echo $result4['name']; ?>"><?php echo $result4['name']; ?></option>
                    <?php
                            $h++;
                        }
                    } else {
                        // echo "no FoUnD";
                    }
                    ?>
                </select>
            </div>
            <button class="sub2" type="submit" require>Submit</button>
        </form>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-check"></i>
                    <span class="text">Employees</span>
                </div>

                <table class="table">
                    <thead>

                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Department</th>
                        </tr>

                    </thead>
                    <tbody class="table-group-divider">

                        <div class="">
                            <?php
                            if ($total2 = mysqli_num_rows($data2) > 0) {
                                $j = 0;

                                while ($result2 = mysqli_fetch_array($data2)) {
                            ?>

                                    <tr class="">
                                        <td> <?php echo $result2['id']; ?> </td>
                                        <td> <?php echo $result2['name']; ?> </td>
                                        <td>

                                            <img src="../<?php echo $result2['img']; ?>" alt="" height="40px" width="20px">
                                        </td>
                                        <td> <?php echo $result2['deptm']; ?> </td>



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

            body::-webkit-scrollbar {
                width: 0px;
                height: 0px;
            }

            .drawer {
                padding-left: 35px;
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


            #ck {
                height: 15px;
                margin: 0 0;
                width: 20px;
            }

            .a1 {
                display: flexbox;
                width: 59.5%;
            }

            .a2 {
                display: flexbox;
                width: 59.5%;
            }


            #formx {
                background-color: #fff;
                border-radius: 7px;
                width: 80%;
                height: 515px;
                padding: 0.5%;
                /* margin-top: -5%; */
                margin-left: 1%;
                display: flex;
            }

            #formx input {
                width: 98%;
                height: 42px;
                border: 1px solid black;
                border-radius: 5px;
                text-align: center;
                padding: 2%;
                margin-left: 1%;
                margin-bottom: 35px;
            }

            #formx select {
                width: 98%;
                height: 42px;
                border: 1px solid black;
                border-radius: 5px;
                text-align: center;
                padding: 0 2%;
                margin-left: 1%;
                margin-bottom: 35px;
                background: transparent;

            }

            .mult-select-tag .input-container {
                display: flex;
                flex-wrap: wrap;
                flex: 1 1 auto;
                padding: 0.1rem;
                border: 1px solid black;
                border-radius: 5px;
                height: 42px;
                border-right: none;
                border-top-right-radius: 0px;
                border-bottom-right-radius: 0px;
                width: 98%;
            }

            .mult-select-tag .btn-container {
                color: #e2ebf0;
                padding: .5rem;
                display: flex;
                border-left: 1px solid var(--border-color);
                border: 1px solid black;
                border-radius: 5px;
                border-left: none;
                border-top-left-radius: 0px;
                border-bottom-left-radius: 0px;
            }


            #formx label {
                color: black;
                font-size: medium;
                margin: 2%;
            }

            .sub2 {
                width: 47%;
                background-color: skyblue;
                color: #000;
                border-radius: 6px;
                height: 40px;
                padding: 1% 2%;
                margin-left: -85%;
                margin-top: 536px;
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

            .vibrant-x {
                background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
                border: none;
                border-radius: 4px;
                width: 58px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            #alt1 {
                display: flex;
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
                /* display: flexbox; */
                height: 30px;
                width: 9%;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                /* margin-top: 1%; */
                margin-left: 12px;
                text-align: center;
                padding-top: 3.2px;
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
    </section>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('countries')
    </script>
    <script src="script.js"></script>
</body>

</html>