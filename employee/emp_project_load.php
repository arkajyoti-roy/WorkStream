<?php
include '../conn.php';
session_start();

if (isset($_SERVER["REQUEST_METHOD"])) {

    $pro_name = $_POST['pro_name'];
    $description = $_POST['description'];
    $submitted = $_POST['submitted'];
    $submittedby = $_POST['submittedby'];

    if ($_FILES['file']['name']) {
        move_uploaded_file($_FILES['file']['tmp_name'], "../zoom/" . $_FILES['file']['name']);
        $file =  $_FILES['file']['name'];


        $sql = "INSERT INTO `pro`.`complete` (`pro_name`, `description`,  `submitted`, `submittedby`,  `file`) VALUES ('$pro_name', '$description', '$submitted','$submittedby', '$file')";

        if (mysqli_query($conn, $sql)) {


            // echo "Success";


        } else {
            echo "Error: SORRY $sql";
        }

        $sql2 = mysqli_query($conn, "UPDATE `task` SET `upload_date` = current_timestamp() WHERE `p_name` = '$pro_name';");
        $sql3 = mysqli_query($conn, "UPDATE `man_task` SET `upload_date` = current_timestamp() WHERE `p_name` = '$pro_name';");
    }
}
header("location:emp_project_loader.php");
