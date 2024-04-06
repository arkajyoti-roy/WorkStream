<?php
include '../conn.php';


if (isset($_POST['email_verify'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = rand(1000000000, 9999999999);
    $check_email = "SELECT email FROM staff WHERE email= '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];
        $update_token = "UPDATE staff SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $token_run = mysqli_query($conn, $update_token);
        if ($token_run) {
            session_start();

            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "Password reset link has been send.";
            $_SESSION['status2'] = $token;
            $_SESSION['status3'] = $emp;
            header("Location: log_forgot.php");
        } else {
            $_SESSION['status'] = "Error!";
            header("Location: log_forgot.php");
        }
    } else {
    }
    $_SESSION['status'] = "No Email Found";
    header("Location: log_forgot.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function send_password_reset($get_name, $get_email, $token)
    {





        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        // if(isset($_POST["staff_load"])){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'softwares.workstream@outlook.com';
        $mail->Password = 'mvgpdexvdimascvc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('softwares.workstream@outlook.com', 'WorkStream'); // Your
        $mail->addAddress($get_email);
        $mail->isHTML(true);
        $mail->Subject = $_POST["Reset Password"];
        $mail->Body = " <img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjTpPlOXteK9di54VjovTlfDTctqqFocSo8lcu6dPZW_TRzLIXiHYnJjdfbJ5tf3_6wKNRpcCfFN6IaU0nnHVX6i-I9uz8e_r1VSrhdHyNHt4_boorfUFfdQc0iUqJP1F2wfd-fAGOcmWNxECLTQ30noXWPdZ4j38dbtiehd8A_0-RwpTspmUlE2lqteYAq/w627-h235/logo.png'>
    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear " .
            "<h2>Hello </h2>" . $get_name .
            "Reset your password <br>" .
            "<a href='http://localhost/WorkStream/employee/log_forgot_verify.php?token=$token&email=$get_email'> Click Here</a>";
        $mail->send();
    }


    ?>
</body>

</html>