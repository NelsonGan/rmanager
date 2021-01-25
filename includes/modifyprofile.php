<?php
session_start();
if (isset($_POST['submit-update'])) {
    require ("conn.php");

    $staffid = $_POST['staffid'];
    $name = $_POST['name'];
    $pwd = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $hourlyrate = $_POST['hourlyrate'];

    $sql = "UPDATE staff SET name ='$name', pwd='$pwd', gender='$gender', dob ='$dob', phone='$phone', address='$address', role = '$role', hourlyrate = '$hourlyrate' WHERE Staff_ID='$staffid'";
    mysqli_query($con,$sql);
    header("Location: ../modifyprofile.php?staffid=$staffid&update=success");
}
else 
{
    header("Location: ../profile-staff.php");
}