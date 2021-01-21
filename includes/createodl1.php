<?php

if (isset($_POST["save"])) {
    include("conn.php");

    $orderid = $_POST['orderidd'];
    $source = $_POST['source'];
    $itemid = $_POST['itemid'];
    $quantity = $_POST['quantity'];
    if (isset($_POST['price1'])) {
        $price = $_POST['price1'];
    }

    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    }

    $query = "SELECT * FROM order_detail WHERE orderid = " . $orderid . " AND Item_ID = " . $itemid . " ";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Item has already existed in the list.");
    window.location.href="../Order.php";
    </script>';
    } else {



        $sql = "INSERT INTO order_detail (orderid, Item_ID, quantity, price, amount) 
            VALUES ('$orderid', '$itemid', '$quantity', '$price', '$amount' )";
        if (mysqli_query($con, $sql)) {
            if ($source == 'history') {
                echo '<script>
        window.location.href="../edito.php?orderid='.$orderid.'";
        </script>';
            } else {
                echo '<script>
            window.location.href="../edito.php?orderid='.$orderid.'";
            </script>';
            }
            echo json_encode(array("statusCode" => 200));
        } else {
            //     die('Error:' . mysqli_error($con));
            //     echo '<script>alert("Fail to add");
            //   </script>';
            echo json_encode(array("statusCode" => 201));
            mysqli_close($con);
        }
    }
}
