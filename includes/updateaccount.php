<?php
session_start();
if (isset($_POST['submit-update'])) {
    require ("conn.php");

    $email = $_POST['email'];
    $password = $_POST['currentpwd'];
    $newpassword = $_POST['newpwd'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $id = $_SESSION['Staff_ID'];

    $sql = "SELECT * FROM staff WHERE Staff_ID='$id' AND pwd='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $sql = "UPDATE staff SET pwd='$newpassword', phone='$phone', address='$address', email='$email' WHERE Staff_ID='$id'";
        mysqli_query($con,$sql);
        header("Location: ../updateprofile.php?update=success");
    }
    else 
    {
        header("Location: ../updateprofile.php?error=wrongpwd");
    }
}
else 
{
    header("Location: ../profile-staff.php");
}