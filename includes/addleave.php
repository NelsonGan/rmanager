<?php
session_start();
if (isset($_POST['submit'])) 
{
    require "conn.php";
    $id = $_SESSION['Staff_ID'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $reason = $_POST['reason'];
    $status = "Pending";
    
    $sql = "INSERT INTO leaves (Staff_ID, startdate, enddate, reason, status) VALUES ('$id', '$startdate', '$enddate', '$reason', '$status')";
    if (mysqli_query($con, $sql)) 
    {
        header("Location: ../leaverequestform.php?submit=success");
    }
    else 
    {
        header("Location: ../leaverequestform.php?mysql=error");
    }
}   
else 
{
    header("Location: leaverequestform.php");
}