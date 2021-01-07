<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventory.css" rel="stylesheet" type="text/css">
    <script src="javascripts/inventory.js"></script>
</head>

<body>
    <?php include "sidebar.php";?>
    <?php include "includes/conn.php"?>
    <?php include "includes/conversionfunctions.php"?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Record</span>
        </div>

        <center>
            <p class="topheader">Inventory Record for <?php numToMonth($_GET['month']); echo('&nbsp;'); echo $_GET['year'] ?></p>

            <input type="text" id="itemfilter" placeholder="Filter:" onkeyup="filterFunction()">

            <select id="locations" name="locations" onchange="filterFunctionDrop()">
                <option value="all">All</option>
            <?php 
                $sql = "SELECT * FROM locations;";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    $name = strtolower($row['name']);
                    echo '<option value="'.$name.'">'.$row['name'].'</option>';
                }
            ?>
            </select>

            <form action="confirminventory.php?month=<?php echo $_GET['month'];?>&year=<?php echo $_GET['year'] ?>" method="post">
            <div>
                <table class="itemtable" id="itemlist">
                    <tr>
                        <th style="width: 20%;">Item Code</th>
                        <th style="width: 30%;">Item Name</th>
                        <th style="width: 25%;">Location</th>
                        <th style="width: 15%;">Quantity</th>
                        <th style="width: 10%;">Unit</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM inventory ORDER BY location";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        $itemcode = sprintf("%04d",$row['Inventory_ID']);
                        echo '<tr>';
                        echo "<td>".$itemcode."</td>";
                        echo "<td>".$row['itemname']."</td>";
                        echo "<td>".$row['location']."</td>";
                        echo '<td><input type="number" class="quantity" name="'.$itemcode.'" autocomplete="off" value="0" onClick="this.select();"></td>';
                        echo "<td>".$row['unit']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>

                <input type="Submit" value="Submit" class="btn" id="submitrecord">
            </div>
            </form>
        </center>
        
    </div>
</body>