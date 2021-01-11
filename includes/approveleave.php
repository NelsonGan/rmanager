<?php
session_start();
$staffid = $_POST['staffid'];
$leaveid = $_POST['leaveid'];

if (isset($_POST['approve-submit']) && $_SESSION['role'] == 'Owner') 
{
    require "conn.php";
    $sql = "UPDATE leaves SET status='Approved' WHERE Staff_ID='$staffid' AND Leave_ID='$leaveid'";
    mysqli_query($con,$sql);
    header("Location: ../viewleave.php");
}
elseif (isset($_POST['decline-submit']) && $_SESSION['role'] == 'Owner')
{
    require "conn.php";
    $sql = "UPDATE leaves SET status='Declined' WHERE Staff_ID='$staffid' AND Leave_ID='$leaveid'";
    mysqli_query($con,$sql);
    header("Location: ../viewleave.php");
}
else 
{
    header("Location: ../login.php");
}
