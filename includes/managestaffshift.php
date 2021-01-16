<?php
if (isset($_POST['add'])){
    require "conn.php";
    $toadd = explode(",", $_POST['toAdd']);
    $toremove = explode(",", $_POST['toRemove']);

    $numtoadd = count($toadd);
    $numtoremove = count($toremove);

    $shiftid = $_POST['shiftid'];

    if ($_POST['toAdd'] != "null"){
        for ($i = 0; $i < $numtoadd; $i++){
            $staffid = $toadd[$i];
            $sql = "SELECT * FROM schedule WHERE Staff_ID = '$staffid' AND Shift_ID = '$shiftid'";
            $result = mysqli_query($con, $sql);
            if (!(mysqli_num_rows($result) > 0)){
                $sql = "INSERT INTO schedule (Staff_ID, Shift_ID) VALUES ('$staffid','$shiftid')";
                mysqli_query($con, $sql);
            }
        }
    }
    if ($_POST['toRemove'] != "null"){
        for ($i = 0; $i < $numtoremove; $i++){
            $staffid = $toremove[$i];
            $sql = "SELECT * FROM schedule WHERE Staff_ID = '$staffid' AND Shift_ID = '$shiftid'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0){
                $sql = "DELETE FROM schedule WHERE Staff_ID = '$staffid' AND Shift_ID = '$shiftid'";
                mysqli_query($con, $sql);
            }
        }
    }

    header("Location: ../schedule.php");
}

