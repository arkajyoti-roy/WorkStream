<?php
include '../conn.php';

session_start();
error_reporting(0);
if (isset($_SERVER["REQUEST_METHOD"])) {

    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $deptm = $_POST['deptm'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $man = $_POST['man'];
    $du = $_POST['du'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $subject = $_POST['subject'];

    if ($_FILES['img']['name']) {
        move_uploaded_file($_FILES['img']['tmp_name'], "image/" . $_FILES['img']['name']);
        $img = "image/" . $_FILES['img']['name'];

        $sql = "INSERT INTO `pro`.`staff` (`empid`, `man`, `du`, `name`, `img`, `deptm`, `phone`, `email`, `pass`, `dt`) VALUES ('$empid', '$man', '$du', '$name', '$img', '$deptm', '$phone', '$email', '$hash', current_timestamp())";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: SORRY $sql";
        }
    }
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
    <div class="qw">
        <?php





        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';

        // if(isset($_POST["staff_load"])){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'softwares.workstream@outlook.com';
        $mail->Password = 'ejkezvkaaezlqoou';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('softwares.workstream@outlook.com', 'WorkStream'); // Your
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = " <img src='https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjTpPlOXteK9di54VjovTlfDTctqqFocSo8lcu6dPZW_TRzLIXiHYnJjdfbJ5tf3_6wKNRpcCfFN6IaU0nnHVX6i-I9uz8e_r1VSrhdHyNHt4_boorfUFfdQc0iUqJP1F2wfd-fAGOcmWNxECLTQ30noXWPdZ4j38dbtiehd8A_0-RwpTspmUlE2lqteYAq/w627-h235/logo.png'>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dear " . $_POST["name"] . ", Congratulations you're selected to our company. Here at WorkStream, we believe in fostering a collaborative and innovative work environment, and we're confident that your skills and expertise will be a valuable addition to our company. <br><br>

In the meantime, here are a few things to help you get started:
<br><br>

User id: " . $_POST["email"] .
            "<br> Password: " . $_POST["pass"] .
            "<br><br>
Best regards,<br><br>
" .
            "WorkStream <br>" .
            "Contact: 8974335084";

        $mail->send();
        // }



        header("location:staff.php");
        ?>

    </div>
    <style>
        .qw {
            font-size: medium;
        }
    </style>
</body>

</html>