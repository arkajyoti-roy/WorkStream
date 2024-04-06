<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_02"] == false) {
    header("location: ../log.php");
}
// error_reporting(0);
$nm = $_SESSION['nm'];
$img = $_SESSION['img'];

$em = $_SESSION["email2"];


$data = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em';");
$data21 = mysqli_query($conn, "SELECT * FROM staff WHERE email='$em';");

if ($total41 = mysqli_num_rows($data21) > 0) {
    $kd = 0;

    while ($result41 = mysqli_fetch_array($data21)) {
        $deptm = $result41['deptm'];
        $kd++;
    }
} else {
    echo "no FoUnD";
}


$data3 = mysqli_query($conn, "SELECT * FROM man_task WHERE deptm ='$deptm' AND upload_date='1000-01-01' ORDER BY id DESC;");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Task</title>
    <style>
        body {
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <table class="table">
                    <tbody class="table-group-divider">

                        <div class="op">
                            <?php
                            if ($total3 = mysqli_num_rows($data3) > 0) {
                                $k = 0;

                                while ($result3 = mysqli_fetch_array($data3)) {
                            ?>
                                    <tr class="">
                                        <td> <?php echo $result3['id']; ?> </td>
                                        <td></td>
                                        <td> <?php echo $result3['p_name']; ?> </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo $result3['desc']; ?> </td>
                                        <td></td>
                                        <td> <?php echo date('d-M-Y', strtotime($result3['starting_date'])); ?> </td>
                                        <td> <?php echo date('d-M-Y', strtotime($result3['ending_date'])); ?> </td>
                                    </tr>
                            <?php
                                    $k++;
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
            body::-webkit-scrollbar {
                width: 0px;
                height: 0px;
            }

            .op {
                margin-top: -37px;
            }

            .vibrant-y {
                background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
                border: none;
                border-radius: 4px;
                width: 58px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            #alt1 {
                display: none;
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

            #p9 {
                height: 98px;
                width: 193px;
                border-radius: 0px;
                margin-top: -10px;
                margin-bottom: -40px;
                margin-left: 5px;
            }

            #btn {
                /* display: flexbox; */
                height: 30px;
                width: 9%;
                color: black;
                background-color: skyblue;
                border-radius: 6px;
                /* margin-top: 1%; */
                margin-left: 176px;
                text-align: center;
                /* padding-top: 3.2px; */
                font-size: 14px;
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
        <script src="script.js"></script>
</body>

</html>