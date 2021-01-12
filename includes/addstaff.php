<?php

session_start();
if (isset($_POST['add-submit']))
{
    require "conn.php";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $hourlyrate = '0';
    $datejoined = date("Y-m-d");

    $sql = "SELECT * FROM staff WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) == 0) 
    {
        $sql = "INSERT INTO staff (name, email, pwd, gender, dob, phone, address, role, hourlyrate, datejoined) VALUES ('$name', '$email', '$password', '$gender', '$dob', '$phone', '$address', '$role', '$hourlyrate', '$datejoined');";
        mysqli_query($con, $sql);
        header("Location: ../addstaff.php?add=success");
    }
    else
    {
        header("Location: ../addstaff.php?error=emailexist");
    }
}