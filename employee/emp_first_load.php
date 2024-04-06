<?php
include '../conn.php';
if (isset($_SERVER["REQUEST_METHOD"])) {


    $name = $_POST['name'];
    $deptm = $_POST['deptm'];
    $email = $_POST['email'];
    $work_ex = $_POST['work_ex'];
    $cur_add = $_POST['cur_add'];
    $cur_city = $_POST['cur_city'];
    $cur_state = $_POST['cur_state'];
    $cur_zip = $_POST['cur_zip'];
    $empid = $_POST['empid'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $quali = $_POST['quali'];
    $per_add = $_POST['per_add'];
    $per_city = $_POST['per_city'];
    $per_state = $_POST['per_state'];
    $per_zip = $_POST['per_zip'];


    $sql = "INSERT INTO `pro`.`details` 
(`name`, `deptm`,  `email`, `work_ex`, `cur_add`, `cur_city`, `cur_state`,`cur_zip`,`empid`, `role`,  `phone`, `quali`, `per_add`, `per_city`, `per_state`,`per_zip`)
 VALUES ('$name', '$deptm',  '$email', '$work_ex', '$cur_add', '$cur_city', '$cur_state','$cur_zip','$empid', '$role',  '$phone', '$quali', '$per_add', '$per_city', '$per_state','$per_zip')";


    $sql2 = " UPDATE staff SET email = '$email', phone = '$phone' WHERE email = '$email' AND name = '$name' ";

    if (mysqli_query($conn, $sql)) {
        // echo "Success";
        if (mysqli_query($conn, $sql2)) {
            // echo "Success";
        } else {
            echo "Error: SORRY $sql";
        }
    } else {
        echo "Error: SORRY $sql";
    }
}

header("location:emp_task.php");
