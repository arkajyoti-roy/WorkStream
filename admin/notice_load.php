<?php
include '../conn.php';

if (isset($_SERVER["REQUEST_METHOD"])) {

    error_reporting(0);

    $subject = $_POST['subject'];
    $details = $_POST['details'];
    $user = $_POST['user'];

    if ($user == 'all') {
        $man = 'Manager & Employee';
        $deptm = 'All Department';
    } else {

        $options =  mysqli_query($conn, "SELECT * FROM staff WHERE name='$user';");


        if ($total21 = mysqli_num_rows($options) > 0) {
            $jp = 0;

            while ($result21 = mysqli_fetch_array($options)) {
                $man = $result21['man'];
                $jp++;
            }
        } else {
            echo "no FoUnD";
        }
        $deptm = $_POST['deptmx'];
    }




    $sql = "INSERT INTO `pro`.`notice` (`subject`, `details`, `deptm`, `man`, `ford`, `user`,`seen`) VALUES ('$subject', '$details', '$deptm', '$man', 'admin', '$user', 'not_seen')";

    if (mysqli_query($conn, $sql)) {


        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }
}

$data4 = mysqli_query($conn, "SELECT `email`,`name` FROM `staff` WHERE `name`='$user';");

if ($total2 = mysqli_num_rows($data4) > 0) {
    $j = 0;

    while ($result2 = mysqli_fetch_array($data4)) {

        $er = $result2['email'];

        $j++;
    }
} else {
    echo "no FoUnD";
}




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
// $mail->setFrom('softwares.workstream@outlook.com','WorkStream Notices'); // Your
// $mail->addAddress($er);
// $mail->isHTML(true);
// $mail->Subject = $_POST["subject"];
// $mail->Body = "<img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW95REKBuK_0NMVDOObOKnu81MNrEnXIX2xmzXlrAuHxARBw4H-BHMEvMayBhvU692urXPx8v0xu7x4HxryxYEbFHQxUtqjWEqhY6KcMM7hq1wHjWr4aBS6TRdFKCbYfoAsWaVLbLYHclSIY7TIzIBKoE_VMN1pxaj-gYNw09SFrRVPZif3GFkEntThHlf/w203-h76/logo.png'> 
// <br>
//  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear " 
//  . $_POST["user"] . " This is a Notice from WorkStream <br> Subject : ". $_POST["subject"] ."<br> Having The Details :<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
//  . $_POST["details"] . "<br><br> Regards, Your Admin";

// $mail->send();
// }


header("location:notice.php");
