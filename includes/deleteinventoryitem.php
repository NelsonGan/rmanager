<?php 

echo $_POST['itemtodel'];

session_start();

if (isset($_POST['itemtodel'])) {
    require "conn.php";
    $id = $_POST['itemtodel'];
    $sql = "DELETE FROM inventory WHERE Inventory_ID = '$id'";
    mysqli_query($con, $sql);
    header("Location: ../manageinventory.php");
} else {
    header("Location: ../manageinventory.php");
}