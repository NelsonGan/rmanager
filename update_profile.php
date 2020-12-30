<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/update_profile.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include "sidebar.html"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Default Text</span>
        </div>

        <div class="container">
            <p class="name">Muhammad Ali</p>
                <div class="content">
                    <div class="content-left">
                        <p>Phone:</p>
                        <p>Address:</p>
                        <p>Email:</p>
                        <p>Password:</p>
                        <p>Confirm Password:</p>
                    </div>
                    <div class="content-right">
                        <input type="textbox"><br>
                        <input type="textbox"><br>
                        <input type="textbox"><br>
                        <input type="textbox"><br>
                        <input type="textbox"><br>
                    </div>
                </div>  

                <input type="submit" class="btn" value="Clear" style="margin-top: 10px; height: 35px;"> 
                <input type="submit" class="btn" value="Update" style="margin-top: 10px; height: 35px;"> 
        </div>  

    </div>
</body>