<?php
session_start();
if (isset($_POST['submit'])) 
{
    require "conn.php";
    $id = $_SESSION['Staff_ID'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $status = "Pending";
    
    $sql = "INSERT INTO leaves (Staff_ID, leavedate, reason, status) VALUES ('$id', '$date', '$reason', '$status')";
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