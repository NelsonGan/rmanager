<?php


if (isset($_POST["create"])) {

    include("conn.php");

    $orderid = $_POST['orderid'];
    $net = $_POST['net'];
    $name = $_POST['nname'];


    $sql = "UPDATE orders SET netamount = '$net' WHERE orderid ='$orderid'";

    if (mysqli_query($con, $sql)) {


        echo '<script>alert("New Order for ' . $name . ' has been created");
        window.location.href="table.php";
                </script>';
    } else {
        die('Error:' . mysqli_error($con));
        echo '<script>alert("Fail to create order.");
      </script>';
    }



    mysqli_close($con);
}
