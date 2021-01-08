<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/manageinventory.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Manage Inventory</span>
        </div>

        <center>
            <p class="header">Current Inventory Item List</p>

            <a><button class="btn">Add New Item</button></a>

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
                                <th style="width: 20%;">Item Code</th>
                                <th style="width: 30%;">Item Name</th>
                                <th style="width: 20%;">Unit</th>
                                <th style="width: 30%;">Unit Price</th>
                            </tr>

                            <?php 
                            while ($iteminfo = mysqli_fetch_assoc($items)){
                                $itemcode = sprintf("%04d",$iteminfo['Inventory_ID']);
                                //in case the database is updated after entering the value but before submitting
                                echo "<tr>";
                                echo "<td>".$itemcode."</td>";
                                echo "<td>".$iteminfo['itemname']."</td>";
                                echo "<td>".$iteminfo['unit']."</td>";
                                echo "<td>".$iteminfo['price']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>
        </center>
        <!-- Write your code here! -->

    </div>
</body>