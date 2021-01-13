<!DOCTYPE html>
<head>
    <title>Inventory Records</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventoryrecords.css" rel="stylesheet" type="text/css">
    <script src="javascripts/inventoryrecords.js"></script>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"; ?>
    <?php include "includes/conversionfunctions.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Records</span>
        </div>

        <!-- Write your code here! -->
        <center>
            <form action="inventoryrecords.php" method="POST">
                <p class="title">YEAR:</p>
                <select class="recordselect" name="year" id="yearselect" onchange="submit()">
                    <?php 
                    $sql = "SELECT logyear FROM inventory_log GROUP BY logyear ORDER BY logyear DESC";
                    $result = mysqli_query($con, $sql);
                    while ($year = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$year['logyear'].'">'.$year['logyear'].'</option>';
                    }
                    ?>
                </select>
                
                <?php
                if (isset($_POST['year'])){
                    echo '<p class="title">MONTH:</p>';
                    echo '<select class="recordselect" name="month" id="monthselect" onchange="submit()">';
                    echo '<option value="null">-Select a month-</option>';
                        $selectedyear = $_POST['year'];
                        $sql = "SELECT logmonth FROM inventory_log WHERE logyear = ".$selectedyear." ORDER BY logmonth";
                        $result = mysqli_query($con, $sql);
                        while ($month = mysqli_fetch_assoc($result)){
                            echo '<option>';
                            numToMonth($month['logmonth']); 
                            echo '</option>';
                        }
                        
                    echo '</select>';
                }
                
                ?>
                

                <!--Setting the year index if the value is set -->
                <?php
                if (isset($_POST['year'])){
                    echo "<script>window.setYearIndex('".$_POST['year']."');</script>";
                } 

                if (isset($_POST['month'])){
                    echo "<script>window.setMonthIndex('".$_POST['month']."');</script>";
                } 
                ?>
                <button id="submitform" class="invisible" type="submit"></button>
            </form>

            <?php
            if (isset($_POST['year']) && isset($_POST['month'])){
                if ($_POST['month'] != 'null') { ?>
                    <script>window.checkMonth('<?php echo $_POST['month']; ?>');</script>
                    <p class="recordtitle">Inventory Record of <?php echo $_POST['month']; echo " "; echo $_POST['year'];?></p>

                    <?php 
                    $month = ReturnMonthToNum($_POST['month']);
                    $year = $_POST['year'];
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
                    
            <?php }
            } ?>
        </center>

    </div>
</body>