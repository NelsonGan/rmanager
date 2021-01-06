<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link rel="stylesheet" href="stylesheets/addmenuitem.css">
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Add Menu Item</span>
        </div>
        
        <div class="container">
                <div class="content">
                    <div class="content-left">
                        <p>Name :</p>
                        <p>Price :</p>
                        <p>Type :</p>
                        <p>Description :</p>
                        <p class="uploadImageText">Upload image :</p>
                    </div>
                    <div class="content-right">
                        <input type="textbox"><br>
                        <input type="textbox"><br>
                        <select id="role" name="role">
                            <option value="null">Select-one</option>
                            <option value="Food">Food</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Appetizers">Appetizers</option>
                            <option value="Desserts">Desserts</option>
                        </select><br>
                        <textarea rows="4" cols="50" name="comment"></textarea><br>
                        <input type="textbox" class="uploadImageTextBox"><br>
                    </div>
                </div>  

                <input type="submit" class="btn" value="Clear" style="margin-top: 10px; height: 35px;"> 
                <input type="submit" class="btn" value="Add Item" style="margin-top: 10px; height: 35px;"> 
        </div>  
    </div>
</body>