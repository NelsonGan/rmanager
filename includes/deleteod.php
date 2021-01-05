<?php
include("conn.php");

$id = intval($_GET['id']);
//$source = intval($_GET['source']);


$result = mysqli_query($con, "DELETE FROM order_detail WHERE orderdetail_ID=$id");

mysqli_close($con);
header("Location: ../Order.php");
// if ($source == 'history') {
//     echo '<script>
// window.location.href="edito.php?orderid=' . $id . '";
// </script>';
// } else {
//     echo '<script>
// window.location.href="Order.php";
// </script>';
// }
?>