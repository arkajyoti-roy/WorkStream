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


    </nav>

    <section class="dashboard">
        <div class="top">
            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>

            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="45px" width="45px" alt=""> </a>
        </div>
        <hr style="color: #000;">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <span class="text">Personal Details</span>
                </div>
            </div>
        </div>


        <?php
        if ($total3 = mysqli_num_rows($data) > 0) {
            $k = 0;

            while ($result3 = mysqli_fetch_array($data)) {
        ?>

                <form action="emp_first_load.php" id="formx" method="POST">
                    <div class="hx1">
                        Name: <input type="text" name="name" value="<?php echo $result3['name']; ?>" readonly required>
                        Department: <input type="text" name="deptm" value="<?php echo $result3['deptm']; ?>" readonly required>
                        Email: <input type="email" name="email" value="<?php echo $result3['email']; ?>" required>
                        Work Experience: <input type="text" name="work_ex" required>
                        Current Address: <input type="text" name="cur_add" required placeholder="Current Address">
                        City: <input type="text" name="cur_city" required placeholder="Current Address City">
                        State: <input type="text" name="cur_state" required placeholder="Current Address State">
                        Zip Code: <input type="number" name="cur_zip" min="786145" max="799120" required placeholder="Current Address Zip Code">
                    </div>


                    <div class="hx2">
                        Emp ID: <input type="text" name="empid" value="<?php echo $result3['empid']; ?> " readonly required>
                        Role: <input type="text" name="role" value="<?php echo $result3['man']; ?>" readonly required>
                        Phone: <input type="number" name="phone" min="60000000" max="9999999999" value="<?php echo $result3['phone']; ?>" required>
                        Qualication: <input type="text" name="quali" required>
                        Permanent Address: <input type="text" name="per_add" required placeholder="Permanent Address">
                        City: <input type="text" name="per_city" required placeholder="Permanent Address City">
                        State: <input type="text" name="per_state" required placeholder="Permanent Address State">
                        Zip Code: <input type="number" name="per_zip" min="786145" max="799120" required placeholder="Permanent Address Zip Code">
                    </div>
                    <button class="sub" type="submit">SUBMIT</button>
                </form>
                <div style="width: 98px;">

                </div>

        <?php
                $k++;
            }
        } else {
            echo "no FoUnD";
        }
        ?>

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
                color: gray;
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

            .sub {
                width: 38%;
                background-color: lightblue;
                color: #000;
                border-radius: 5px;
                height: 40px;
                padding: 1% 2%;
                margin-left: -66%;
                margin-top: 783px;
                cursor: pointer;
                margin-bottom: 70px;
                font-size: 16px;
                font-weight: bold;
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