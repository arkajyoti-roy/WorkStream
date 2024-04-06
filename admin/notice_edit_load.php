<?php
include '../conn.php';

error_reporting(0);
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {

    if ($conn) {
        // echo "Success connecting to the db";
    }
    $i1 = $_POST['i1'];
    $i2 = $_POST['subject'];
    $i3 = $_POST['details'];
    $i4 = $_POST['user'];
    $sql = " UPDATE notice SET subject = '$i2', details = '$i3', user = '$i4' WHERE id = '$i1' ";

    $conn->query($sql);
}
header('location:notice.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="logo.png">
</head>

<body>
    <img src="https://th.bing.com/th/id/OIP.JbKS1r3ckymebDZhEGRdcQHaJ4?w=148&h=198&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="">
</body>

</html>