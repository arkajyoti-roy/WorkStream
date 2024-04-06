<?php
include '../conn.php';

error_reporting(0);
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {

    if ($conn) {
    }
    $j1 = $_POST['j1'];

    $sql = " UPDATE `leave` SET status = 'Approved' WHERE id = '$j1' ";

    $conn->query($sql);

    $data4 = mysqli_query($conn, "SELECT * FROM `leave` WHERE id ='$j1';");

    if ($total2 = mysqli_num_rows($data4) > 0) {
        $j = 0;

        while ($result2 = mysqli_fetch_array($data4)) {

            $name = $result2['name'];
            $start_date = $result2['start_date'];
            $last_date = $result2['last_date'];
            $email = $result2['email'];
            $reason = $result2['reason'];

            $j++;
        }
    } else {
        echo "no FoUnD";
    }





    // $data5 = mysqli_query($conn, "SELECT `email`,`name` FROM `staff` WHERE `name`='$es';");

    // if ($total5 = mysqli_num_rows($data5) > 0) {
    //     $k = 0;

    //     while ($result5 = mysqli_fetch_array($data5)) {

    //         $er = $result5['email'];

    //         $k++;
    //     }
    // } else {
    //     echo "no FoUnD";
    // }


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
// $mail->addAddress($email);
// $mail->isHTML(true);
// $mail->Subject = "Leave request has been approved";
// $mail->Body = "<img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW95REKBuK_0NMVDOObOKnu81MNrEnXIX2xmzXlrAuHxARBw4H-BHMEvMayBhvU692urXPx8v0xu7x4HxryxYEbFHQxUtqjWEqhY6KcMM7hq1wHjWr4aBS6TRdFKCbYfoAsWaVLbLYHclSIY7TIzIBKoE_VMN1pxaj-gYNw09SFrRVPZif3GFkEntThHlf/w203-h76/logo.png'> 
// <br>
//  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear " 
//  . $name . ", Your leave request for ".$reason. " from ".$start_date." to " .$last_date." has been approved. <br><br> Regards, Your Admin";

// $mail->send();
// }




header('location:leave.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="https://th.bing.com/th/id/OIP.JbKS1r3ckymebDZhEGRdcQHaJ4?w=148&h=198&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="">
</body>

</html>