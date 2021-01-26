<!DOCTYPE html>
<head>
    <title>Edit</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/editinventoryrecords.css" rel="stylesheet" type="text/css">
</head>

<body>
    <script src="javascripts/editinventoryrecords.js"></script>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php" ?>
    <?php include "includes/conversionfunctions.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Edit Inventory Record</span>
        </div>

        <center>
        <?php
        if (isset($_POST['year']) && isset($_POST['month'])){ ?>
            

            <p class="recordtitle">Inventory Record of <?php numToMonth($_POST['month']) ; echo " "; echo $_POST['year'];?></p>
            <button class="btn" onclick="goBack()">Back to record</button>

            <?php 
            $month = $_POST['month'];
            $year = $_POST['year'];
            $sql = "SELECT * FROM inventory_log WHERE logyear = $year AND logmonth = $month";
            $result = mysqli_query($con, $sql);
            $inventoryrecord = mysqli_fetch_assoc($result);
            
            $staff = $inventoryrecord['Staff_ID'];
            $sql = "SELECT * FROM staff WHERE Staff_ID = $staff";
            $result = mysqli_query($con, $sql);
            $staffdetails = mysqli_fetch_assoc($result);
            
            ?>

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
                                <th style="width: 18%;">Item Code</th>
                                <th style="width: 25%;">Item Name</th>
                                <th style="width: 15%;">Unit</th>
                                <th style="width: 20%;">Unit Price</th>
                                <th style="width: 12%;">Quantity</th>
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
                                echo "<td>".$iteminfo['amount']."</td>";
                                echo '<td><button onclick="showModal('.$iteminfo['Inventory_ID'].')" class="editbtn">Edit</button></td>';
                                echo "</tr>";
                            }
                            ?>
                        </table>

                        <div onclick="closeModal()" id="modalwrapper"></div>
    
                        <div id="quantitymodal">
                            <form action="includes/updateinventory.php" method="POST" autocomplete="off">
                                <center>
                                <p class="modaltitle">New Quantity:</p>
                                <input type="hidden" name="month" value="<?php echo $month ?>">
                                <input type="hidden" name="year" value="<?php echo $year ?>">
                                <input type="hidden" id="logID" name="logID" value="<?php echo $inventoryrecord['Log_ID'] ?>">
                                <input type="hidden" id="invID" name="invID">
                                <input type="number" name="quantity" class="inputtext" min="0" required> <br>
                                <button type="submit" class="submitbutton" name="update">Update</button>
                                </center>
                            </form>
                        </div>
                    </div>
                <?php } //for if mysqli_num_row > 0?> 
            <?php } //for while $row = $result?>
        <?php } else {
            header("Location: inventoryrecords.php");
        }  // for if year and month isset ?>
        </center>

        <form action="inventoryrecords.php" method="POST">
            <input type="hidden" name="month" value="<?php numToMonth($month) ?>">
            <input type="hidden" name="year" value="<?php echo $year ?>">
            <button type="submit" id="back" style="border: none;"></button>
        </form>
    </div>
</body>