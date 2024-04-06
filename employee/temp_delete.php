<?php
include '../conn.php';
// error_reporting(0);
session_start();

$dateTime = new DateTime();
$root = $dateTime->format("Y-m-d");
echo $root;
$nm = $_SESSION['nm'];
$email2 = $_SESSION["email2"];

$sql = "DELETE FROM `staff` WHERE `du` <= current_timestamp();";
$sql2 = "SELECT * FROM `task` WHERE `ending_date` = $root AND `members` LIKE '%$nm%';";

if ($sql2 > 0) {
    // echo 1;
    header('location:last_notice.php');
} else {
    // echo 2;
    header('location:emp_task.php');
}
// }
