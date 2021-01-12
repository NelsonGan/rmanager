<!DOCTYPE html>
<head>
    <title>Confirm</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventorymainpage.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>
    <?php $GLOBALS['onclick'] = "template.php"; ?>
    <?php include "includes/modal.php" ?>
    

    <?php
        function showrecordbtn($month, $year){
            require "includes/conn.php";
            $sql = "SELECT * FROM inventory_log WHERE logmonth = $month AND logyear = $year";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo '<a href="inventory.php?month='.$month.'&year='.$year.'"><button type="button" class="createbtn">Create Record</button></a>';
            } else {
                echo '<span class="created">Created  <i class="fa fa-check" aria-hidden="true"></i></span>';
            }
        }
    ?>

    <div class="mainbody">
        <div class="topbar">
            <span>Inventory</span>
        </div>

        <center>
            <p style="margin-top: 40px; font-size: 30px;">Inventory</p>

            <table class="daytable">
                <tr>
                    <td style="width: 70%;">Inventory Record for January <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(1, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for February <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(2, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for March <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(3, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for April <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(4, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for May <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(5, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for June <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(6, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for July <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(7, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for August <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(8, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for September <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(9, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for October <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(10, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for November <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(11, date("Y")); ?></td>
                </tr>

                <tr>
                    <td style="width: 70%;">Inventory Record for December <?php echo date("Y") ?></td>
                    <td class="btncolumn"><?php showrecordbtn(12, date("Y")); ?></td>
                </tr>
            </table>

        </center>
        
    </div>
</body>