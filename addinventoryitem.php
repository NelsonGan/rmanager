<!DOCTYPE html>
<head>
    <title>Inventory</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/addinventoryitem.css" rel="stylesheet" type="text/css">
    <script src="javascripts/addinventoryitem.js"></script>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Add Inventory Item</span>
        </div>
        
        <center>
        <?php
        if (isset($_GET['error'])){
            echo '<p class="errormessage">An error occurred. Please try again.</p>';
        }
        ?>

        <p class="header">New Item Details</p>

        <div class="container">
            <form action="includes/addInvItem.php" method="Post" autocomplete="off">
                <div class="content">
                    <div class="content-left">
                        <p>Item Name:</p>
                        <p>Cost Price:</p>
                        <p>Unit:</p>
                        <p>Item Location:</p>
                        <p>Supplier:</p>
                    </div>
                    
                    <div class="content-right">
                        <input type="textbox" name="itemname" required><br>

                        <input type="number" name="itemcost" step="0.01" required><br>

                        <input type="textbox" name="itemunit" required><br>

                        <select name="location">
                        <?php 
                        $sql = "SELECT * FROM locations";
                        $result = mysqli_query($con, $sql);
                        while ($location = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$location['Location_ID'].'">'.$location['name'].'</option>';
                        }
                        ?>
                        </select>
                        
                        <button type="button" onclick="showModal('location')" class="addbtn">Add Location</button>
                        <?php 
                        if (isset($_GET['locationadded'])){
                            if ($_GET['locationadded'] == 'true'){
                                echo '<span class="newnote">Location added.</span>';
                            } else {
                                echo '<span class="failednote">Failed to add location.</span>';
                            }
                        }
                        ?>
                        
                        <br>

                        <select name="supplier">
                        <?php 
                        $sql = "SELECT * FROM supplier";
                        $result = mysqli_query($con, $sql);
                        while ($supplier = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$supplier['Supplier_ID'].'">'.$supplier['companyname'].'</option>';
                        }
                        ?>
                        </select>
                        
                        <button type="button" onclick="showModal('supplier')" class="addbtn">Add Supplier</button>

                        <?php 
                        if (isset($_GET['supplieradded'])){
                            if ($_GET['supplieradded'] == 'true'){
                                echo '<span class="newnote">Supplier added.</span>';
                            } else {
                                echo '<span class="failednote">Failed to add supplier.</span>';
                            }
                        }
                        ?>
                        
                        
                        <br>
                    </div>
                </div>  

                <input type="submit" name="submit" class="btn" value="Add Item" style="margin-top: 10px; height: 35px;"> 
            </form>
        </div>  
        </center>
    </div>

    <div onclick="closeModal()" id="modalwrapper"></div>

    <div id="locationmodal">
        <form action="includes/addlocation.php" method="POST">
            <center>
            <p class="modaltitle">Add New Location</p>
            <input type="text" name="locationname" class="inputtext" required> <br>
            <button type="submit" class="submitbutton" name="add">Confirm</button>
            </center>
        </form>
    </div>

    <div id="suppliermodal">
        <form action="includes/addsupplier.php" method="POST">
            <center>
            <p class="modaltitle">Add New Supplier</p>

            <span class="formlabels">Company Name: </span>
            <input type="text" name="suppliername" class="inputtext" required> <br>
            
            <span class="formlabels">Phone Number: &nbsp;</span>
            <input type="text" name="supplierphone" class="inputtext" required> <br>
            
            <span class="formlabels">Email Address: &nbsp;&nbsp;</span>
            <input type="text" name="supplieremail" class="inputtext" required> <br>
            
            <span class="formlabels">Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <input type="text" name="supplieraddress" class="inputtext" required> <br>
            
            <button type="submit" class="submitbutton" name="add">Confirm</button>
            </center>
        </form>
    </div>

    
</body>