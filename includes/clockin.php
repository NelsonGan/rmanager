<?php
session_start();
date_default_timezone_set('Asia/Kuala Lumpur');
$id = $_SESSION['Staff_ID'];
$datetoday = date('Y-m-d');
$timenow = date("H:i:s");
$currentday = date('d');
$currentmonth = date('m');
$currentyear = date('Y');

if (isset($_POST['clockin-submit'])) {
    require "conn.php";
    $sql = "INSERT INTO attendance (Staff_ID, workdate, clockin) VALUES ('$id', '$datetoday', '$timenow');";
    mysqli_query($con, $sql);
    header("Location: ../checkin.php");
}

if (isset($_POST['clockout-submit'])) {
    require "conn.php";
    $sql = "UPDATE attendance SET clockout = '$timenow' WHERE Staff_ID = '$id' AND MONTH(workdate) = '$currentmonth' AND YEAR(workdate) = '$currentyear';";
    mysqli_query($con, $sql);
    header("Location: ../checkin.php");
}

header("Location: ../checkin.php");