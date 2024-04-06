<?php
include '../conn.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dateTime = new DateTime();
$root = $dateTime->format("Y-m-d");
echo $root;
$nm = $_SESSION['nm'];
$email2 = $_SESSION["email2"];

$sql = "DELETE FROM `staff` WHERE `du` <= CURRENT_TIMESTAMP;";
$sql2 = "SELECT * FROM `task` WHERE `ending_date` = $root AND members LIKE '%$nm%';";

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp-mail.outlook.com';
$mail->SMTPAuth = true;
$mail->Username = 'softwares.workstream@outlook.com';
$mail->Password = 'mvgpdexvdimascvc';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('softwares.workstream@outlook.com', 'WorkStream Tasks'); // Your
$mail->addAddress($email2);
$mail->isHTML(true);
$mail->Subject = "Task from WorkStrem";
$mail->Body = "<img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW95REKBuK_0NMVDOObOKnu81MNrEnXIX2xmzXlrAuHxARBw4H-BHMEvMayBhvU692urXPx8v0xu7x4HxryxYEbFHQxUtqjWEqhY6KcMM7hq1wHjWr4aBS6TRdFKCbYfoAsWaVLbLYHclSIY7TIzIBKoE_VMN1pxaj-gYNw09SFrRVPZif3GFkEntThHlf/w203-h76/logo.png'> 
    <br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear ";

$mail->send();


header('location:emp_task.php');
