<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventory.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Record</span>
        </div>

        <center>
            <p style="margin-top: 40px; font-size: 30px;">Inventory Record for December 2020</p>

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

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td><input type="text" class="quantity"></td>
                    </tr>

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td><input type="text" class="quantity"></td>
                    </tr>

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td><input type="text" class="quantity"></td>
                    </tr>
                </table>

                <input type="Submit" value="Submit" class="btn" id="submitrecord">
            </div>
        </center>
        
    </div>
</body>