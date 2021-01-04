<?php
include("conn.php");

$id = intval($_GET['orderid']);

// $sql = "DELETE FROM orders WHERE orderid=$id ;
// DELETE FROM order_detail WHERE orderid=$id";

$sql = "DELETE o.*, od.* FROM orders o, order_detail od WHERE o.orderid=$id AND od.orderid=$id";

// if (mysqli_query($con, $sql)) {


//     echo '<script>alert("DELETED");
//     window.location.href="history.php";
//             </script>';
// } else {
//     die('Error:' . mysqli_error($con));
//     echo '<script>alert("Fail to delete order.");
//   </script>';
// }
$result = mysqli_query($con, $sql);

mysqli_close($con);
header("Location: history.php");
?>