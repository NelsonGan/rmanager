<?php

if (isset($_POST['add'])){
    require "conn.php";

    $suppliername = $_POST['suppliername'];
    $supplierphone = $_POST['supplierphone'];
    $supplieremail = $_POST['supplieremail'];
    $supplieraddress = $_POST['supplieraddress'];
    $sql = "INSERT into supplier (companyname, phonenumber, email, address) VALUES ('$suppliername', '$supplierphone', '$supplieremail', '$supplieraddress')";
    if (mysqli_query($con, $sql)){
        header("Location: ../addinventoryitem.php?supplieradded=true");
    } else {
        header("Location: ../addinventoryitem.php?supplieradded=false");
    }
} else {
    header("Location: ../manageinventory.php");
}