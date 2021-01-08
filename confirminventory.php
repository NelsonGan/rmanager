<!DOCTYPE html>
<head>
    <title>Confirm</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/confirminventory.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>
    <?php include "includes/conn.php"?>
    <?php include "includes/conversionfunctions.php"?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Submission</span>
        </div>

        <center>
            <p class="headertext">Inventory Record Submission</p>
            <br>
            <p style="font-size: 30px;"><?php numToMonth($_GET['month']);?> <?php echo $_GET['year']?></p>

            <form action="includes/createrecord.php?month=<?php echo $_GET['month'];?>&year=<?php echo $_GET['year'] ?>" method="POST">
            <?php 
            $sql = "SELECT * FROM locations";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                //We check if the location has any items before displaying the div
                $sql = "SELECT * FROM inventory WHERE location='".$row['name']."'";
                $items = mysqli_query($con, $sql);
                if (mysqli_num_rows($items) > 0){ ?>
                    <div>
                        <p class="locationtitle"><?php echo $row['name'] ?></p>
                        <hr class="line">
                        <table class="itemtable">
                            <tr>
                                <th style="width: 30%;">Item Code</th>
                                <th style="width: 40%;">Item Name</th>
                                <th style="width: 40%;">Quantity</th>
                            </tr>

                            <?php 
                            while ($iteminfo = mysqli_fetch_assoc($items)){
                                $itemcode = sprintf("%04d",$iteminfo['Inventory_ID']);
                                //in case the database is updated after entering the value but before submitting
                                if (isset($_POST[$itemcode])){
                                    $quantity = $_POST[$itemcode];
                                } else {
                                    $quantity = 0;
                                }
                                echo "<tr>";
                                echo "<td>".$itemcode."</td>";
                                echo "<td>".$iteminfo['itemname']."</td>";
                                /*echo "<td>".$quantity."</td>"; */
                                echo '<td><input type="text" class="quantity" name="'.$itemcode.'" value="'.$quantity.'" readonly></td>';
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>

            <input type="Submit" name="submit" value="Submit" class="btn" id="submitrecord">

            </form>

            
        </center>
        
    </div>
</body>