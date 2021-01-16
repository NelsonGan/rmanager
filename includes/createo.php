<?php
session_start();

if (isset($_POST["create"])) {

  include("conn.php");

  $orderid = $_POST['orderid'];
  $net = $_POST['net'];
  $name = $_POST['nname'];
  $staff = $_SESSION["Staff_ID"];

  $sql = "UPDATE orders SET netamount = '$net',staffid='$staff' WHERE orderid ='$orderid'";
  $query = mysqli_query($con,"SELECT * FROM order_detail WHERE orderid ='$orderid'");
  $num_rows = mysqli_num_rows($query);


  if ($num_rows > 0) {
    if (mysqli_query($con, $sql)) {


      echo '<script>alert("New Order for ' . $name . ' has been created");
        window.location.href="../table.php";
                </script>';
    } else {
      die('Error:' . mysqli_error($con));
      echo '<script>alert("Fail to create order.");
      </script>';
    }
  } else {
    echo '<script>alert("Please add at least one item to continue!");
    window.location.href="../Order.php";
            </script>';
  }


  mysqli_close($con);
}
