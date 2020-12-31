<?php
include("conn.php");

$id = intval($_GET['id']);
$orderid = intval($_GET['orderid']);


$result = mysqli_query($con, "DELETE FROM order_detail WHERE orderdetail_ID=$id");

mysqli_close($con);
header("Location: edito.php?orderid=".$orderid);
?>