<?php

if (isset($_POST['add'])){
    require "conn.php";
    $locationname = $_POST['locationname'];
    $sql = "INSERT into locations (name) VALUES ('$locationname')";
    if (mysqli_query($con, $sql)){
        header("Location: ../addinventoryitem.php?locationadded=true");
    } else {
        header("Location: ../addinventoryitem.php?locationadded=false");
    }
} else {
    header("Location: ../manageinventory.php");
}