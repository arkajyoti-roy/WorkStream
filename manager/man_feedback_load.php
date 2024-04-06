<?php
include '../conn.php';
if (isset($_SERVER["REQUEST_METHOD"])) {

    $name = $_POST['name'];
    $deptm = $_POST['deptm'];
    $man = $_POST['man'];
    $problem = $_POST['problem'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `pro`.`feedback` (`name`, `deptm`, `man`, `problem`, `desc`) VALUES ('$name', '$deptm', '$man', '$problem', '$desc')";

    if (mysqli_query($conn, $sql)) {


        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }
}

header("location:man_feedback_loader.php");
