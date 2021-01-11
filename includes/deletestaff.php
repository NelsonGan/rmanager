<?php
session_start();

if (isset($_POST['delete-submit']) && $_SESSION['role'] == 'Owner')
{
    require "conn.php";
    $id = $_POST['staffid'];
    $sql = "DELETE FROM staff WHERE Staff_ID = '$id'";
    mysqli_query($con, $sql);
    header("Location: ../viewstaff.php");
}


