<?php
include '../conn.php';
if (isset($_SERVER["REQUEST_METHOD"])) {
    $p_name = $_POST['p_name'];
    $starting_date = $_POST['starting_date'];
    $leader = $_POST['leader'];
    $deptm = $_POST['deptm'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $ending_date = $_POST['ending_date'];
    $member = $_POST['countries'];
    $almem = implode(", ", $member);

    $sql = "INSERT INTO `pro`.`task` (`p_name`, `starting_date`, `leader`, `deptm`, `desc`, `status`, `ending_date`, `upload_date`, `member`, `dt`) VALUES ('$p_name', '$starting_date', '$leader', '$deptm', '$desc', '$status', '$ending_date', '1000-01-01', '$almem', current_timestamp())";
    $sql2 = "UPDATE `man_task` SET `upload_date` = current_timestamp() WHERE `p_name` = '$p_name';";

    if (mysqli_query($conn, $sql)) {

        if (mysqli_query($conn, $sql2)) {


            // echo "Success";


        } else {
            echo "Error: SORRY $sql2";
        }

        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }





    // $data4 = mysqli_query($conn, "SELECT `email`,`name` FROM `staff` WHERE `name`='$p_name';");

    //     if ($total2 = mysqli_num_rows($data4) > 0) {
    //         $j = 0;

    //         while ($result2 = mysqli_fetch_array($data4)) {

    //             $er = $result2['email'];

    //             $j++;
    //         }
    //     } else {
    //         echo "no FoUnD";
    //     }
    //     $data5 = mysqli_query($conn, "SELECT `email`,`name` FROM `staff` WHERE `name`='$almem' AND `name`='$leader';");
    //     if ($total5 = mysqli_num_rows($data5) > 0) {
    //         $k = 0;

    //         $vr[$total5];
    //         while ($result5 = mysqli_fetch_array($data5)) {

    //             $vr[$k] = $result5['email'];

    //             $k++;
    //         }
    //     } else {
    //         echo "no FoUnD";
    //     }
    // }

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require 'phpmailer/src/Exception.php';
    // require 'phpmailer/src/PHPMailer.php';
    // require 'phpmailer/src/SMTP.php';

    // // if(isset($_POST["staff_load"])){
    // $mail = new PHPMailer(true);
    // $mail->isSMTP();
    // $mail->Host = 'smtp-mail.outlook.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'softwares.workstream@outlook.com';
    // $mail->Password = 'nigjfiuqyxwsttlb';
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;
    // $mail->setFrom('softwares.workstream@outlook.com', 'WorkStream Tasks'); // Your
    // $mail->addAddress($vr[]);
    // $mail->isHTML(true);
    // $mail->Subject = "Task from WorkStrem";
    // $mail->Body = "<img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW95REKBuK_0NMVDOObOKnu81MNrEnXIX2xmzXlrAuHxARBw4H-BHMEvMayBhvU692urXPx8v0xu7x4HxryxYEbFHQxUtqjWEqhY6KcMM7hq1wHjWr4aBS6TRdFKCbYfoAsWaVLbLYHclSIY7TIzIBKoE_VMN1pxaj-gYNw09SFrRVPZif3GFkEntThHlf/w203-h76/logo.png'> 
    //     <br>
    //      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear "
    //     . "Members" . " This is a task from WorkStream assigned by your Admin.<br> Project Name: " . $_POST["p_name"] . "<br>"

    //     . "Leader: " . $leader . " will be your leader for this project.<br>" .
    //     "Members: " . $almem . "<br>" .
    //     "Submit your project and report by 5 PM " . $ending_date .
    //     "<br>" .
    //     "<br><br> Regards, Your Admin";

    // $mail->send();
}

header("location:man_task.php");
