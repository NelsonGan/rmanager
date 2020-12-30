<!DOCTYPE html>
<head>
    <title>Confirm</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/confirminventory.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.html"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Inventory Submission</span>
        </div>

        <center>
            <p style="margin-top: 40px; font-size: 30px;">Inventory Record Submission</p>

            <div>
                <p class="locationtitle">Storeroom</p>
                <hr class="line">
                <table class="itemtable">
                    <tr>
                        <th style="width: 30%;">Item Code</th>
                        <th style="width: 40%;">Item Name</th>
                        <th style="width: 40%;">Quantity</th>
                    </tr>

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td>6</td>
                    </tr>
                </table>
            </div>

            <div>
                <p class="locationtitle">Kitchen</p>
                <hr class="line">
                <table class="itemtable">
                    <tr>
                        <th style="width: 30%;">Item Code</th>
                        <th style="width: 40%;">Item Name</th>
                        <th style="width: 40%;">Quantity</th>
                    </tr>

                    <tr>
                        <td>001</td>
                        <td>Potato</td>
                        <td>6</td>
                    </tr>
                </table>
            </div>

            <input type="Submit" value="Submit" class="btn" id="submitrecord">
        </center>
        
    </div>
</body>