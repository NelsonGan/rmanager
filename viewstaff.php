<!DOCTYPE html>
<head>
    <title>Manage Staff</title>
    <link rel="stylesheet" href="stylesheets/viewstaff.css">
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>

    <?php
        require ("includes/conn.php");
        $id = $_SESSION['Staff_ID'];
        $sql = "SELECT * FROM staff WHERE role<>'Owner'";
        $result = mysqli_query($con, $sql);
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Staff List</span>
        </div>

        <div class="search">
            <center>
                <input type="text" class="searchbar" placeholder="Filter...">
                <a href="addstaff.php" class='btn' id="addstaff">Add</a>
            </center>
        </div>
        
        <div class="staff">

            <?php
                while ($row = mysqli_fetch_assoc($result)) { 
            ?>

            <div class = "profile">
                <center>
                    <a href="profile-owner.php?staffid=<?php echo $row['Staff_ID'];?>"><img src="images/profile.png" alt="blank profile pic"></a>
                </center>
                <h2><?php echo $row['name'];?></h2>
                <p><?php echo $row['role'];?></p>
            </div>

            <?php }?>
        </div>
        
    </div>
</body>