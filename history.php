<!DOCTYPE html>
<html>

<head>
    <meta charset="utf=8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>RManager</title>

    <meta name="description" content="IE=edge">
    <meta name="desciption" content="">
    <meta name="viewpoint" content="width=device-width, intitial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="stylesheets/history.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">



    <style>
        .mainbody {
            width: 85%;
            margin-left: 15%;
            position: static;
        }

        body,
        html {
            font-family: 'Open Sans', sans-serif;
            margin: 0px;
            height: 100%;
            background: #F5F5F5;

        }

        body {
            display: flex;
        }


        .topbar {
            background: #262626;
            width: 100%;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .topbar span {
            margin: 3px;
            color: white;
            font-size: 20px;
            margin-left: 15px;
            vertical-align: middle;
        }


    </style>



</head>

<body>
<?php include "sidebar.html"; ?>

    <div class="mainbody">
        <div class="topbar">
            <span>Order History</span>
        </div>
        <br><br>

        <div style="margin-bottom:100px;">
            <form action="history.php" method="post">
                <div id="left">

                    <div class="input-group mb-3">
                        <div class="autocomplete-container" style="width:300px;">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Order ID / Customer Name">
                        </div>
                        <div class="input-group-append">
                            <input class="btn btn-outline-secondary" type="submit" id="submit" name="submit" value="Search">
                        </div>
                    </div>


                </div>

                <script>
                    $(function() {
                        $("#search").autocomplete({
                            source: 'backend.php'
                        });
                    });
                </script>


                <div id="right">

                    <div class="input-group mb-3">
                        <span style="white-space: nowrap; align-content: center; vertical-align: middle ">
                            <!-- <div>Sort By :</div> -->
                            <label for="sort">Sort By : </label>
                            <select name="sort" id="sort">
                                <option value="" selected>Default</option>
                                <option value="nameasc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'nameasc') ? 'selected' : ''; ?>>Name (A - Z)</option>
                                <option value="namedsc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'namedsc') ? 'selected' : ''; ?>>Name (Z - A)</option>
                                <option value="timedsc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'timedsc') ? 'selected' : ''; ?>>Newest &gt; Oldest</option>
                                <option value="timeasc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'timeasc') ? 'selected' : ''; ?>>Oldest &gt; Newest</option>
                                <option value="amountdsc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'amountdsc') ? 'selected' : ''; ?>>Amount (Most)</option>
                                <option value="amountasc" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'amountasc') ? 'selected' : ''; ?>>Amount (Least)</option>
                                <option value="paid" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'paid') ? 'selected' : ''; ?>>Status (PAID)</option>
                                <option value="unpaid" <?php echo (isset($_POST['sort']) && $_POST['sort'] === 'unpaid') ? 'selected' : ''; ?>>Status (UNPAID)</option>

                            </select>


                            <button type="submit" name="find" class="btn btn-primary find"><i class="fa fa-filter" aria-hidden="true"></i></button>
                        </span>
                    </div>


                </div>
            </form>
        </div>
        <!--container-->

        <!--Search & Edit & Delete-->
        <table class="table table-bordered">
            <thead>
                <tr id="product">
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Date Time</th>
                    <th scope="col">Total Amount (RM)</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Print</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("conn.php");

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM orders WHERE orderid LIKE '" . $search . "%' OR customername LIKE '" . $search . "%'";
                } elseif (isset($_POST['find'])) {

                    $sort = $_POST['sort'];

                    // if ($sort == 'nameasc'){
                    //     $sql = "SELECT * FROM orders ORDER BY customername";
                    // }
                    switch ($sort) {
                        case 'nameasc':
                            $sql = "SELECT * FROM orders ORDER BY customername";
                            break;
                        case 'namedsc':
                            $sql = "SELECT * FROM orders ORDER BY customername DESC";
                            break;
                        case 'timedsc':
                            $sql = "SELECT * FROM orders ORDER BY odatetime DESC";
                            break;
                        case 'timeasc':
                            $sql = "SELECT * FROM orders ORDER BY odatetime";
                            break;
                        case 'amountdsc':
                            $sql = "SELECT * FROM orders ORDER BY netamount DESC";
                            break;
                        case 'amountasc':
                            $sql = "SELECT * FROM orders ORDER BY netamount";
                            break;
                        case 'paid':
                            $sql = "SELECT * FROM orders WHERE paidstatus='PAID'";
                            break;
                        case 'unpaid':
                            $sql = "SELECT * FROM orders WHERE paidstatus='UNPAID'";
                            break;
                        default:
                            $sql = "SELECT * FROM orders";
                            break;
                    }
                } else {
                    $sql = "SELECT * FROM orders";
                }

                $result = mysqli_query($con, $sql);

                $counter = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $counter . '</th>';
                    echo '<td>' . $row['orderid'] . '</td>';
                    echo '<td>' . $row['customername'] . '</td>';
                    echo '<td>' . $row['tableno'] . '</td>';
                    echo '<td>' . $row['odatetime'] . '</td>';
                    echo '<td>' . $row['netamount'] . '</td>';
                    echo '<td>' . $row['paidstatus'] . '</td>';
                    echo '<td><a href="edito.php?orderid=' . $row['orderid'] . '"><button type="button" class="btn btn-outline-warning editbtn"><i class="fa fa-edit" aria-hidden="true"></i></button></a></td>';
                    echo '<td><a onclick="return confirm(\'Delete record for OrderID ' . $row['orderid'] . '?\')" href="deleteo.php?orderid=' . $row['orderid'] . '">
      <button type="button" class="btn btn-outline-danger delete"><i class="fa fa-close"></button></td></a></td>';
                    echo '<td><a href="print.php?orderid=' . $row['orderid'] . '">
      <button type="button" class="btn btn-outline-primary print"><i class="fa fa-print" aria-hidden="true"></i></button></td></a></td>';
                    echo '<tr>';
                    $counter++;
                }
                ?>

            </tbody>
        </table>

    


        </div>

    <div class="clearfix"></div>
  
</body>


</html>