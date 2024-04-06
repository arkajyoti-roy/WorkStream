<?php
include '../conn.php';
session_start();

if (isset($_POST['update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['emp']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    if (!empty($token)) {
        if (!empty($email) && !empty($pass)) {

            if ($pass) {
                $up_pass = "UPDATE `staff` SET `pass` = '$hash' WHERE `verify_token` = '$token' LIMIT 1";
                $up_pass_run = mysqli_query($conn, $up_pass);
                if ($up_pass_run) {
                    header("location: log.php");
                } else {
                    header("location: log_forgot_verify.php?token=$token&email=$email");
                }
            } else {
                header("location: log_forgot_verify.php?token=$token&email=$email");
            }
        } else {
            header("location: log_forgot_verify.php?token=$token&email=$email");
        }
    } else {
        header("Location: log_forgot_verify.php");
    }
}
// }
