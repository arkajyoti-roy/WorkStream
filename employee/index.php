<?php
session_start();
if ($_SESSION["new_session_03"] == false) {
    header("location:log.php");
}
