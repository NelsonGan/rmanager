<?php 
session_start();
if (isset($_POST['submit'])) 
{
    require "conn.php";

    //create inventory log entry
    $date = date("Y-m-d");
    $logmonth = $_GET['month'];
    $logyear = $_GET['year'];
    $id = $_SESSION['Staff_ID'];
    $sql = "INSERT INTO inventory_log (creationdate, logmonth, logyear, Staff_ID) 
    VALUES ('$date','$logmonth','$logyear','$id')";
    if (mysqli_query($con, $sql)){
        $logID = mysqli_insert_id($con);
        //echo $logID;
    }

    foreach ($_POST as $param_name => $param_val) {
        $invID = $param_name;
        $invAmount = $param_val;
        $sql = "INSERT INTO log_details (Log_ID, Inventory_ID, amount) 
        VALUES ('$logID','$invID','$invAmount')";
        //echo "Param: $param_name; ; Value: $param_val<br />\n";

        if (mysqli_query($con, $sql)){
            header("Location: ../inventorymainpage.php");
        }
    }
}   
else 
{
    header("Location: ../inventorymainpage.php");
}