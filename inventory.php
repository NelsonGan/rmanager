<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/inventory.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div style="flex: 1;">
        <?php include "sidebar.html"; ?>
    </div>
    
    <div style="flex: 5;">
        <div class="topbar">
            <span>Inventory Record</span>
        </div>

        <div>
            <center>
                <table class="itemtable">
                    <tr>
                        <th style="width: 20%;">Item Code</th>
                        <th style="width: 30%;">Item Name</th>
                        <th style="width: 40%;">Quantity</th>
                    </tr>

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </center>
            
        </div>
    </div>
    
</body>