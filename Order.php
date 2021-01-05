<!DOCTYPE html>
<html>
<head>
    <meta charset="utf=8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RManager</title>
    <meta name="description" content="IE=edge">
    <meta name="desciption" content="">
    <meta name="viewpoint" content="width=device-width, intitial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/Order.css">
    <!-- <link href="stylesheets/default.css" rel="stylesheet" type="text/css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

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

        body > div.sidebar > ul{
        padding-left:0;
    }
    </style>
</head>

<body>
    <?php include "sidebar.php";?>

    <div class="mainbody">
        <div class="topbar">
            <span>Add Order</span>
        </div>

        <section class="content">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-md-12 col-xs-12">

                    <div class="box">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">

                            <div style="margin: 40px 14px 40px;">
                                <div style="float:right;  margin-right: 20px;">
                                    <div class="form-group">
                                        <label for="gross_amount" class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="gross_amount" class="col-sm-12 control-label">Time: <?php date_default_timezone_set("Asia/Kuala_Lumpur");
                                                                                                        echo date('h:i a') ?></label>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xs-12 pull pull-left" style="float:left;">

                                    <div class="form-group">

                                        <label for="gross_amount" class="col-sm-5 control-label">Customer Name :</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" id="cname" name="cname" style="text-align:center;" value="<?php $name = $_SESSION["customer"];
                                                                                                                                    echo $name ?>" readonly>
                                        </div>
                                        <br><br>
                                        <label for="gross_amount" class="col-sm-5 control-label">Table :</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" id="table_name" name="table_name" value="<?php $table = $_SESSION["table"];
                                                                                                                    echo $table ?>" style="text-align:center;" readonly>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <br> <br><br> <br><br> <br><br>

                            <div id="container">
                                <div id="left"></div>
                                <div id="right">
                                    <button type="button" id="addd" class="btn btn-outline-success add" data-toggle="modal" data-target="#addadminprofile" style="margin-right:40px; border: solid 2px;"><i class="fas fa-plus"></i> &nbsp; Add New</button>
                                </div>
                                <br><br><br>
                                <table class="table table-bordered" id="product_info_table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:5%;">#</th>
                                            <th>Food / Drink</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>

                                            <th>Remove</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        include("includes/conn.php");
                                        $lastid = $_SESSION["orderid"];
                                        $sql = "SELECT od.*,m.Name FROM order_detail od JOIN menu m on od.Item_ID = m.Item_ID WHERE od.orderid= " . $lastid . "";

                                        $result = mysqli_query($con, $sql);


                                        $counter = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $price = number_format($row['price'], 2);
                                            $amount = number_format($row['amount'], 2);
                                            echo '<tr>';
                                            echo '<th scope="row">' . $counter . '</th>';
                                            echo '<td style="display:none;">' . $row['orderdetail_ID'] . '</td>';
                                            echo '<td>' . $row['Name'] . '</td>';
                                            echo '<td>' . $price . '</td>';
                                            echo '<td>' . $row['quantity'] . '</td>';
                                            echo '<td>' . $amount . '</td>';
                                            $id = $row['orderdetail_ID'];


                                            echo '<td><a href="includes/deleteod.php?id=' . $id . '">
                                            <button type="button" class="btn btn-outline-danger delete" style="border: solid 2px;"><i class="fa fa-close"></i></button></td></a></td>';
                                            echo '<tr>';
                                            $counter++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>

                            <br /> <br />
                            <form action="includes/createo.php" method="post">
                                <div class="col-md-6 col-xs-12 pull pull-right">


                                    <div class="form-group">
                                        <label for="gross_amount" class="col-sm-5 control-label">Gross Amount (RM)</label>
                                        <div class="col-sm-7">
                                            <?php

                                            $sql = "SELECT SUM(amount) as total FROM order_detail WHERE orderid= " . $lastid . "";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $total = number_format($row['total'], 2);
                                                $serv = number_format($total * 0.06, 2);
                                                $net = number_format($total + $serv, 2);
                                            }
                                            mysqli_close($con);

                                            echo '<input type="hidden" id="nname" name="nname" value="' . $name . '">';
                                            echo '<input type="hidden" id="orderid" name="orderid" value="' . $lastid . '">';
                                            echo '<input type="text" class="form-control" id="total" name="total" style="text-align:center;" value="' . $total . '" readonly><br>';
                                            echo ' </div>';
                                            echo ' </div>';
                                            echo '<div class="form-group">';
                                            echo '<label for="service_charge" class="col-sm-5 control-label">Service Charge (6%)</label>';
                                            echo '<div class="col-sm-7">';
                                            echo ' <input type="text" class="form-control" id="service" name="service" value="' . $serv . '" style="text-align:center;" readonly><br>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo ' <div class="form-group">';
                                            echo '<label for="net_amount" class="col-sm-5 control-label">Net Amount (RM)</label>';
                                            echo ' <div class="col-sm-7">';
                                            echo '<input type="text" class="form-control" id="net" name="net" value="' . $net . '" style="text-align:center;" readonly><br>';
                                            ?>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
                <!-- col-md-12 -->
            </div>
            <br><br>
            <div style="display: flex; align-items: center; justify-content: center;">
                <div style="margin:0 auto; display:block;">
                    <button type="submit" name="create" id="create" class="btn btn-primary" style="left: 50; margin-right: 50px;">Create Order</button>
                    <a onclick="return confirm('Are you sure you want to cancel this order?')" href="includes/deleteo1.php?orderid=<?php echo $lastid?>" class="btn btn-warning" id="cancel">Cancel</a>
                </div>
            </div>
            </form>

            <!-- /.box-body -->

            <!-- /.box -->




            <!-- /.box-body -->

            <!-- /.row -->

        </section>

        <!-- /.content -->

        <!-- /.content-wrapper -->


        <!-- Insert order form-->

        <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header1">
                        <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="oform" name="oform" action="includes/createodl.php" method="post">
                        <div class="modal-body">

                            <input type="hidden" id="source" name="source" value="">
                            <input type="hidden" id="orderid" name="orderid" value="<?php echo  $lastid; ?>">
                            <div>
                                <label for="formGroupExampleInput">Food / Drink</label>
                                <select class="form-control select_group product" id="product_1" name="itemid" style="width:100%;" data-live-search="true" title="Food/Drink Name" required>
                                    <option value=""></option>
                                </select>
                            </div><br>

                            <div id="replace">
                                <div class="formGroupExampleInput">
                                    <div> <label for="price">Unit Price (RM)</label></div>
                                    <input type="text" class="form-control" disabled>
                                </div>
                                <!-- <div id="price"></div> -->

                            </div>
                            <br>


                            <div class="formGroupExampleInput">
                                <div> <label for="price">Quantity</label></div>
                                <input type="number" class="form-control" name="quantity" id="quantity" step="1" min="0" required>
                            </div><br>

                            <div>
                                <label for="formGroupExampleInput">Amount (RM)</label>
                                <input type="text" class="form-control" id="amount" name="amount" readonly>
                            </div>


                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" id="save" name="save" class="btn btn-primary" value="Add">
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Insert order form-->


        <script>
            $(document).ready(function() {
                //load data in dropdwon for food input
                $('#product_1').selectpicker();

                load_data('food_data');

                function load_data(fname) {
                    $.ajax({
                        url: "includes/load.php",
                        //url:"C:\wamp64\www\RManager\load.php",
                        method: "POST",
                        data: {
                            fname: fname
                        },
                        dataType: "json",
                        success: function(data) {
                            var html = '';
                            for (var count = 0; count < data.length; count++) {
                                html += '<option  value="' + data[count].id + '">' + data[count].name + '</option>';
                            }
                            if (fname == 'food_data') {
                                $('#product_1').html(html);
                                $('#product_1').selectpicker('refresh');
                            }



                        }
                    })
                }

                //load data for price input
                $('#product_1').change(function() {
                    $.ajax({
                        url: 'includes/secondlist.php',
                        //url:"C:\wamp64\www\RManager\secondlist.php",
                        data: {
                            product_1_id: $(this).val()
                        },
                        dataType: 'html',
                        type: 'POST',
                        success: function(data) {
                            $('#replace').html(data);
                        }
                    });
                    // var price1 = document.getElementById('price1');
                    // console.log('price1.value'); 
                });


                //display data for amount input
                // function getTotal() {
                $('#quantity').change(function() {
                    //var form = element.form;
                    //   var total = Number("#quantity" .val()) * Number("#price".val());
                    //   total = total.toFixed(2);
                    //   "#amount".val(total);
                    //form.amount.value = form.quantity.value * form.price.value;
                    a = Number(document.getElementById('quantity').value);
                    b = Number(document.getElementById('price1').value);
                    c = a * b;
                    c = c.toFixed(2);
                    document.getElementById('amount').value = c


                    // };
                });



                //Insert function
                // $('#save').on('click', function() {
                //     $("#save").attr("disabled", "disabled");
                //     var orderid = $('#orderid').val();
                //     var itemid = $('#product_1').val();
                //     var quantity = $('#quantity').val();
                //     var price1 = $('#price1').val();
                //     var amount = $('#amount').val();
                //     //var total =$('#total').val();

                //     if (itemid != "" && quantity != "") {
                //         $.ajax({
                //             url: "createodl.php",
                //             type: "POST",
                //             data: {
                //                 orderid: orderid,
                //                 itemid: itemid,
                //                 quantity: quantity,
                //                 price1: price1,
                //                 amount: amount,

                //             },
                //             cache: false,
                //             success: function(dataResult) {
                //                 var dataResult = JSON.parse(dataResult);
                //                 if (dataResult.statusCode == 200) {
                //                     $("#save").removeAttr("disabled");
                //                     $('#oform').find('input:text').val('');
                //                     $('#addadminprofile').modal('hide');
                //                     location.reload();


                //                 } else if (dataResult.statusCode == 201) {
                //                     alert("Error occured !");
                //                 }

                //             }
                //         });
                //     } else {
                //         alert('Please fill all the field !');
                //     }



                // });





            });
        </script>

    </div>
    <!-- mainbody -->
</body>

</html>