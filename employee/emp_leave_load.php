<?php
include '../conn.php';
if (isset($_SERVER["REQUEST_METHOD"])) {

    $name = $_POST['name'];
    $deptm = $_POST['deptm'];
    $man = $_POST['man'];
    $type = $_POST['type'];
    $reason = $_POST['reason'];
    $specify = $_POST['specify'];
    $start = $_POST['start'];
    $end = $_POST['last'];
    $email = $_POST['email'];

    if ($_FILES['img']['name']) {
        move_uploaded_file($_FILES['img']['tmp_name'], "../leave_file/" . $_FILES['img']['name']);
        $img = "../leave_file/" . $_FILES['img']['name'];

    $sql = "INSERT INTO `pro`.`leave` (`name`, `deptm`, `man`, `type`, `reason`, `specify`, `img`, `start_date`, `last_date`, `email`, `status`) VALUES ('$name', '$deptm', '$man', '$type', '$reason', '$specify', '$img', '$start', '$end', '$email', 'Pending')";

    if (mysqli_query($conn, $sql)) {

        // echo "Success";

    } else {
        echo "Error: SORRY $sql";
    }
}
}

header("location:emp_leave_loader.php");
