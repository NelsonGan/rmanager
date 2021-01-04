<!DOCTYPE html>
<head>
    <title>Manage Staff</title>
    <link rel="stylesheet" href="stylesheets/viewstaff.css">
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.html"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Staff List</span>
        </div>

        <div class="search">
            <center>
                <input type="text" class="searchbar" placeholder="Filter...">
                <button type="button" id="addstaff">Add Staff</button>
            </center>
        </div>
        
        <div class="staff">
            <div class = "profile">
                <center>
                    <img src="images/profile.png" alt="blank profile pic">
                </center>
                <h2>name</h2>
                <p>position</p>
            </div>

            <div class = "profile">
                <center>
                    <img src="images/profile.png" alt="blank profile pic">
                </center>
                <h2>name</h2>
                <p>position</p>
            </div>

            <div class = "profile">
                <center>
                    <img src="images/profile.png" alt="blank profile pic">
                </center>
                <h2>name</h2>
                <p>position</p>
            </div>
        </div>
        
    </div>
</body>