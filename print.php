<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RManager</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="./stylesheets/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/font-awesome.min.css">
</head>

<body onload="window.print();">
    <?php
    include("includes/conn.php");
    $orderid = intval($_GET['orderid']);
    //$sql = "SELECT * FROM orders WHERE orderid= $orderid";
    $sql = "SELECT o.*,od.* FROM orders o JOIN order_detail od on o.orderid=od.orderid WHERE od.orderid= " . $orderid . "";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {


    ?>

        <div class="wrapper">
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            Order Invoice
                            <small class="pull-right">Date: <?php echo $row["odatetime"]; ?></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">

                    <div class="col-sm-4 invoice-col">
                        <b>Order ID: </b> <?php echo $orderid ?><br>
                        <b>Customer Name: </b> <?php echo $row["customername"]; ?><br>
                        <b>Table Number: </b> <?php echo $row["tableno"]; ?><br>
                        <b>Total items: </b><?php /*echo count($row["orderdetail_ID"]); */ echo $num_rows?><br><br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%;">#</th>
                                    <th>Food / Drink</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include("includes/conn.php");
                                $sql = "SELECT od.*,m.Name FROM order_detail od JOIN menu m on od.Item_ID = m.Item_ID WHERE od.orderid= " . $orderid . "";

                                $result = mysqli_query($con, $sql);
                                
                                $counter = 1;
                                while ($rrow = mysqli_fetch_array($result)) {
                                    $price = number_format($rrow['price'], 2);
                                    $amount = number_format($rrow['amount'], 2);
                                    echo '<tr>';
                                    echo '<th scope="row">' . $counter . '</th>';
                                    echo '<td style="display:none;">' . $rrow['orderdetail_ID'] . '</td>';
                                    echo '<td>' . $rrow['Name'] . '</td>';
                                    echo '<td>' . $price . '</td>';
                                    echo '<td>' . $row['quantity'] . '</td>';
                                    echo '<td>' . $amount . '</td>';
                                    
                                    echo '<tr>';
                                    $counter++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
<br><br><br>
                <div class="row">

                    <div class="col-xs-6 pull pull-right">

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Gross Amount (RM) :</th>
                                    <td><?php $gross= ($row["netamount"]/1.06); echo $gross;?></td>
                                </tr>
                                <tr>
                                    <th>Service Charge (6%) :</th>
                                    <td><?php $serv=($row["netamount"]-$gross); echo $serv; ?></td>
                                </tr>
                                <tr>
                                    <th>Net Amount :</th>
                                    <td> <?php echo $row["netamount"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Paid Status :</th>
                                    <td><?php echo $row["paidstatus"]; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    <?php } ?>
</body>

</html>