<!DOCTYPE html>
<head>
    <title>Inventory Records</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventoryrecords.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Records</span>
        </div>

        <!-- Write your code here! -->
        <center>
            <form>
                <p class="title">SELECT A YEAR:</p>
                <select class="recordselect">
                    <?php 
                    $sql = "SELECT logyear FROM inventory_log GROUP BY logyear ORDER BY logyear DESC";
                    $result = mysqli_query($con, $sql);
                    while ($year = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$year['logyear'].'">'.$year['logyear'].'</option>';
                    }
                    ?>
                </select>
            </form>
        </center>

    </div>
</body>