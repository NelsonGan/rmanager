<?php
if (isset($_POST['add'])) 
{
    require "conn.php";
    $shiftday = $_POST['shiftday'];
    $starttime = $_POST['shiftstart'];
    $endtime = $_POST['shiftend'];

    $sql = "INSERT INTO shifts (shiftday, starttime, endtime) VALUES ('$shiftday', '$starttime', '$endtime');";
    if (mysqli_query($con, $sql)) {
        header("Location: ../schedule.php?added=1");
    } else {
        header("Location: ../schedule.php?added=0");
    }
} else {
    header("Location: ../schedule.php");
}