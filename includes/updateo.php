<?php


if (isset($_POST["update"])) {

    include("conn.php");
    $orderid = $_POST['orderid'];
    $net = $_POST['net'];
    $name = $_POST['nname'];
    $table = $_POST['table'];
    $status= $_POST['status'];


    $sql = "UPDATE orders SET customername='$name', tableno='$table',  paidstatus = '$status', netamount = '$net' WHERE orderid ='$orderid'";

    if (mysqli_query($con, $sql)) {


        echo '<script>alert("Order for   \"OrderID ' . $orderid . '\"   has been updated");
        window.location.href="../history.php";
                </script>';
    } else {
        die('Error:' . mysqli_error($con));
        echo '<script>alert("Fail to update order.");
      </script>';
    }



    mysqli_close($con);
}
