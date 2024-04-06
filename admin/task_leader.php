<?php
include '../conn.php';

error_reporting(0);
session_start();
if (isset($_SERVER['REQUEST_METHOD'])) {

    if ($conn) {
    }
    $j1 = $_POST['j1'];
    $i2 = $_POST['i2'];
    $i3 = $_POST['i3'];
    $sql = "INSERT INTO `pro`.`leader` (`name`, `deptm`, `leader`) VALUES ('$i2', '$i3', 'leader')";

    $conn->query($sql);
}
header('location:task_ass.php');
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