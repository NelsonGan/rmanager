<?php 

if (isset($_POST['shiftid'])) {
    require "conn.php";
    $id = $_POST['shiftid'];
    $sql = "DELETE FROM shifts WHERE Shift_ID = '$id'";
    if (mysqli_query($con, $sql)){
        $sql = "DELETE FROM schedule WHERE Shift_ID = '$id'";
        if (mysqli_query($con, $sql)){
            header("Location: ../schedule.php?deleted=1");
        } else {
            header("Location: ../schedule.php?deleted=0");
        }
    } else {
        header("Location: ../schedule.php?deleted=0");
    }
} else {
    header("Location: ../schedule.php");
}
