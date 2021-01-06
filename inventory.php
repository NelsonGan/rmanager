<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventory.css" rel="stylesheet" type="text/css">
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
            <p style="margin-top: 40px; font-size: 30px;">Inventory Record for <?php numToMonth($_GET['month']); echo('&nbsp;'); echo $_GET['year'] ?></p>

            <input type="text" id="itemfilter" placeholder="Filter:">
            <select id="locations" name="locations">
                <option value="all">All</option>
                <option value="kitchen">Kitchen</option>
                <option value="storeroom">Storeroom</option>
                <option value="fridge">Fridge</option>
                <option value="counter">Counter</option>
            </select>

            <div>
                <table class="itemtable">
                    <tr>
                        <th style="width: 30%;">Item Code</th>
                        <th style="width: 40%;">Item Name</th>
                        <th style="width: 40%;">Quantity</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM inventory";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo "<td>".sprintf("%04d",$row['Inventory_ID'])."</td>";
                        echo "<td>".$row['itemname']."</td>";
                        echo '<td><input type="text" class="quantity"></td>';
                        echo "</tr>";
                    }
                    ?>
                </table>

                <input type="Submit" value="Submit" class="btn" id="submitrecord">
            </div>
        </center>
        
    </div>
</body>