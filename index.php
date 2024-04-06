<?php
include 'conn.php';

session_start();
if ($_SESSION["new_session"] == false || $_SESSION["new_session_02"] == false) {
    header("location:log.php");
}
error_reporting(0);


$conn->close();
