<?php
if (isset($_POST['submit'])) 
{
    require "conn.php";
    $itemname = $_POST['itemname'];
    $itemcost = $_POST['itemcost'];
    $itemunit = $_POST['itemunit'];
    $location = $_POST['location'];
    $supplier = $_POST['supplier'];

    $sql = "INSERT INTO inventory (Supplier_ID, location, itemname, unit, price) VALUES ('$supplier', '$location', '$itemname', '$itemunit','$itemcost')";
    if (mysqli_query($con, $sql)) {
        header("Location: ../manageinventory.php?success=1");
    } else {
        header("Location: ../addinventoryitem.php?error=1");
    }
} else {
    header("Location: ../inventorymainpage.php");
}