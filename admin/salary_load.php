<?php
include '../conn.php';

if (isset($_SERVER["REQUEST_METHOD"])) {

    error_reporting(0);


    $deptm = $_POST["selectedValue2"];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $allowance = $_POST['allowance'];
    $allo_amount = $_POST['allo_amount'];
    $deduction = $_POST['deduction'];
    $ded_amount = $_POST['ded_amount'];
    $basic = $_POST['basic'];
    $total_allo = $_POST['total_allo'];
    $total_ded = $_POST['total_ded'];
    $net_salary = $_POST['net_salary'];
    $mode = $_POST['mode'];
    $_SESSION["Dept"] = $deptm;

    $options =  mysqli_query($conn, "SELECT * FROM staff WHERE name='$name';");


    if ($total21 = mysqli_num_rows($options) > 0) {
        $jp = 0;

        while ($result21 = mysqli_fetch_array($options)) {
            $man =
                $result21['man'];
            $jp++;
        }
    } else {
        echo "no FoUnD";
    }




    $sql = "INSERT INTO `pro`.`salary` (`deptm`, `man`, `name`, `year`, `month`, `allowance`, `allo_amount`, `deduction`, `ded_amount`, `basic`, `total_allo`, `total_ded`, `net_salary`, `mode`) VALUES ('$deptm', '$man', '$name', '$year', '$month', '$allowance', '$allo_amount', '$deduction', '$ded_amount', '$basic', '$total_allo', '$total_ded', '$net_salary', '$mode')";

    if (mysqli_query($conn, $sql)) {


        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }
}

$data4 = mysqli_query($conn, "SELECT `email`,`name` FROM `staff` WHERE `name`='$name';");

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
// $mail->setFrom('softwares.workstream@outlook.com','WorkStream Payment'); // Your
// $mail->addAddress($er);
// $mail->isHTML(true);
// $mail->Subject = 'Salary Payout for '.$_POST["month"];
// $mail->Body = "<img heigth='40px' src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW95REKBuK_0NMVDOObOKnu81MNrEnXIX2xmzXlrAuHxARBw4H-BHMEvMayBhvU692urXPx8v0xu7x4HxryxYEbFHQxUtqjWEqhY6KcMM7hq1wHjWr4aBS6TRdFKCbYfoAsWaVLbLYHclSIY7TIzIBKoE_VMN1pxaj-gYNw09SFrRVPZif3GFkEntThHlf/w203-h76/logo.png'> 
// <br>
//  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear " 
//  . $_POST["name"] . ", Your payment for ". $_POST["month"] ." have been credited to your account through " . $_POST["mode"] .".<br>"
//  ."Basic: Rs. ". $_POST["basic"] . "<br>"
//  ."Allowance: Rs. ". $_POST["allo_amount"] . "<br>"
//  ."Deduction: Rs. ". $_POST["ded_amount"] . "<br>"
//  ."Net Salary: Rs. ". $_POST["net_salary"] . "<br> Thank You.";

// $mail->send();


header("location:salary.php");
