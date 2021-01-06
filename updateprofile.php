<!DOCTYPE html>
<head>
    <title>Update Profile</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/updateprofile.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include "sidebar.php"; ?>

    <?php
        require ("includes/conn.php");
        $id = $_SESSION['Staff_ID'];
        $sql = "SELECT * FROM staff WHERE Staff_ID=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Update Profile</span>
        </div>

        <div class="container">
            <form action="includes/updateaccount.php" method="post">
                <p class="name"><?php echo $row['name'];?></p>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrongpwd") {
                        echo '<p class="error-message">Password entered is invalid!</p>';
                    }
                }
                else if (isset($_GET['update'])) {
                    echo '<p class="success-message">Account updated successfully!</p>';
                }
                ?>   
                    <div class="content">
                        <div class="content-left">
                            <p>Email:</p>
                            <p>Phone:</p>
                            <p>Address:</p>
                            <p>Current Password:</p>
                            <p>New Password:</p>
                        </div>
                        <div class="content-right">
                            <input name="email" type="email" value="<?php echo $row['email'];?>" required><br>
                            <input name="phone" type="phone" value="<?php echo $row['phone'];?>" required><br>
                            <input name="address" type="address" value="<?php echo $row['address'];?>" required><br>
                            <input name="currentpwd" type="password" required><br>
                            <input name="newpwd" type="password" required><br>
                        </div>
                    </div>  
                    <input name="submit-update" type="submit" class="btn" value="Update" style="margin-top: 10px; height: 35px;">
            </form> 
        </div>  

    </div>
</body>