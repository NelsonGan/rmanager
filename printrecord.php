<!DOCTYPE html>
<head>
    <title>Inventory Record</title>
    <link href="stylesheets/printrecord.css" rel="stylesheet" type="text/css">
</head>

<body style="display: block;">
    <?php include "includes/conn.php"; ?>
    <?php include "includes/conversionfunctions.php"; ?>
    
    <center>
    <div class="reportbody">
        <!-- Write your code here! -->
        
            <p class="recordtitle">Inventory Record of <?php numToMonth($_GET['month']); echo " "; echo $_GET['year'];?></p>

            <?php 
            $month = $_GET['month'];
            $year = $_GET['year'];
            $sql = "SELECT * FROM inventory_log WHERE logyear = $year AND logmonth = $month";
            $result = mysqli_query($con, $sql);
            $inventoryrecord = mysqli_fetch_assoc($result);
            
            $staff = $inventoryrecord['Staff_ID'];
            $sql = "SELECT * FROM staff WHERE Staff_ID = $staff";
            $result = mysqli_query($con, $sql);
            $staffdetails = mysqli_fetch_assoc($result);
            
            ?>
            <p class="recordinfo"><b>Record created by: </b><?php echo $staffdetails['name'] ?></p>
            <p class="recordinfo"><b>Record created on: </b><?php echo $inventoryrecord['creationdate'] ?></p>
            

            <?php
            $sql = "SELECT * FROM locations";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                //We check if the location has any items before displaying the div
                $sql = "SELECT inventory.Inventory_ID, itemname, unit, price, amount FROM log_details LEFT JOIN inventory ON log_details.Inventory_ID = inventory.Inventory_ID WHERE log_details.Log_ID = ".$inventoryrecord['Log_ID']." AND location = ".$row['Location_ID'].";";
                $items = mysqli_query($con, $sql);
                if (mysqli_num_rows($items) > 0){
                ?>
                    <div>
                        <p class="locationtitle"><?php echo $row['name'] ?></p>
                        <hr class="line">
                        <table class="itemtable">
                            <tr>
                                <th style="width: 20%;">Item Code</th>
                                <th style="width: 30%;">Item Name</th>
                                <th style="width: 15%;">Unit</th>
                                <th style="width: 25%;">Unit Price</th>
                                <th style="width: 10%;">Quantity</th>
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
                                echo "<td>".$iteminfo['amount']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
            <?php } //for if mysqli_num_row > 0?> 
        <?php } //for while $row = $result?>
    </div>
    </center>
</body>