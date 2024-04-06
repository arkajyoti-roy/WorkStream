<?php
include '../conn.php';
if (isset($_SERVER["REQUEST_METHOD"])) {

    $name = $_POST['name'];
    $deptm = $_POST['deptm'];
    $man = $_POST['man'];
    $reason = $_POST['reason'];
    $start = $_POST['start'];
    $end = $_POST['last'];
    $email = $_POST['email'];



    $sql = "INSERT INTO `pro`.`leave` (`name`, `deptm`, `man`, `reason`, `start_date`, `last_date`, `email`, `status`) VALUES ('$name', '$deptm', '$man', '$reason', '$start', '$end', '$email', 'Pending')";

    if (mysqli_query($conn, $sql)) {


        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }
}


header("location:man_leave_loader.php");
