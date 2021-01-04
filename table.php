<?php session_start(); ?>
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
    <link rel="stylesheet" type="text/css" href="./stylesheets/table.css">
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">




    <script src="scripts/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="stylesheets/sidebar.css">
    <script src="javascripts/sidebar.js"></script>

</head>

<body>
    <?php include "sidebar.html"; ?>

    <div class="mainbody">
        <div class="topbar">
            <span>Select Table Number</span>
        </div>
<br><br>
        <form action="table.php" method="post">

            <div class="form-group">

                <label for="cname" class="col-sm-1 control-label">Customer Name :</label>
                <div class="col-sm-7">
                    <input class="form-control" id="cname" name="cname" autocomplete="off" required>
                </div>
                <br><br><br>

                <label for="size" class="col-sm-1 control-label">Table number :</label>
                <div class="col-sm-7">
                    <input class="form-control" id="size" name="table" readonly>
                </div>


            </div>
            <br>

            <div class="container">


                <h4>Please select a table number : </h4><br><br>
                <div id="shoesize">
                    <div class="row">
                        <div class="col">
                            <input type="button" value="01" class="btn btn-secondary btn-lg" onclick="SetSize('01')">
                        </div>
                        <div class="col">
                            <input type="button" value="02" class="btn btn-secondary btn-lg" onclick="SetSize('02')">
                        </div>
                        <div class="col">
                            <input type="button" value="03" class="btn btn-secondary btn-lg" onclick="SetSize('03')">
                        </div>
                        <div class="col">
                            <input type="button" value="04" class="btn btn-secondary btn-lg" onclick="SetSize('04')">
                        </div>
                        <div class="col">
                            <input type="button" value="05" class="btn btn-secondary btn-lg" onclick="SetSize('05')">
                        </div>
                        <div class="col">
                            <input type="button" value="06" class="btn btn-secondary btn-lg" onclick="SetSize('06')">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <input type="button" value="07" class="btn btn-secondary btn-lg" onclick="SetSize('07')">
                        </div>
                        <div class="col">
                            <input type="button" value="08" class="btn btn-secondary btn-lg" onclick="SetSize('08')">
                        </div>
                        <div class="col">
                            <input type="button" value="09" class="btn btn-secondary btn-lg" onclick="SetSize('09')">
                        </div>
                        <div class="col">
                            <input type="button" value="10" class="btn btn-secondary btn-lg" onclick="SetSize('10')">
                        </div>
                        <div class="col">
                            <input type="button" value="11" class="btn btn-secondary btn-lg" onclick="SetSize('11')">
                        </div>
                        <div class="col">
                            <input type="button" value="12" class="btn btn-secondary btn-lg" onclick="SetSize('12')">
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg" id="next" name="submit">Next</button>
            </div>
            <br><br>
        </form>

        <?php


        if (isset($_POST["submit"])) {

            include("includes/conn.php");

            $name = $_POST['cname'];
            $table = $_POST['table'];
            $status = "UNPAID";

            $sql = "INSERT INTO orders (customername, tableno, paidstatus) 
            VALUES ('$name', '$table', '$status')";

            if (mysqli_query($con, $sql)) {
                $last_id = mysqli_insert_id($con);
                $_SESSION["orderid"] = $last_id;
                $_SESSION["customer"] = $name;
                $_SESSION["table"] = $table;

                echo '<script>alert("You have chosen table number ' . $table . '");
                window.location.href="Order1.php";
                </script>';
            } else {
                die('Error:' . mysqli_error($con));
                echo '<script>alert("Please choose a table number again");
      </script>';
            }



            mysqli_close($con);
        }
        ?>
    </div>
</body>

<script>
    function SetSize(ShoeSize) {
        document.getElementById("size").value = ShoeSize;
    }
</script>


</html>