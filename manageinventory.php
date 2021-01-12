<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/manageinventory.css" rel="stylesheet" type="text/css">

    <script src="javascripts/manageinventory.js"></script>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Manage Inventory</span>
        </div>

        <center>

            <?php
            if (isset($_GET['success'])){
                echo '<p class="successmessage">Item added successfully!</p>';
            }
            ?>

            <p class="header">Current Inventory Item List</p>

            <a href="addinventoryitem.php"><button class="btn">Add New Item</button></a>

            <?php
            $sql = "SELECT * FROM locations";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                //We check if the location has any items before displaying the div
                $sql = "SELECT * FROM inventory WHERE location='".$row['Location_ID']."'";
                $items = mysqli_query($con, $sql);
                if (mysqli_num_rows($items) > 0){ ?>
                    <div>
                        <p class="locationtitle"><?php echo $row['name'] ?></p>
                        <hr class="line">
                        <table class="itemtable">
                            <tr>
                                <th style="width: 20%;">Item Code</th>
                                <th style="width: 30%;">Item Name</th>
                                <th style="width: 15%;">Unit</th>
                                <th style="width: 25%;">Unit Price</th>
                                <th style="width: 10%;"></th>
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
                                echo '<td><button class="delbtn" onclick="delItem(\''.' '.$iteminfo["itemname"].'\','.$iteminfo["Inventory_ID"].')">Delete</button></td>';
                                //<td><button onclick="delItem(' wow')">Delete</button></td>
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>
        </center>
        
        <form action="includes/deleteinventoryitem.php" method="post">
            <input type="hidden" id="itemtext" name="itemtodel"?>
            <button type="submit" style="border: none;" id="submitdel"></button>
        </form>

    </div>
</body>