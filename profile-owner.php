<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/profile-owner.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>

    <?php
        require ("includes/conn.php");
        $id = $_GET['staffid'];
        $sql = "SELECT * FROM staff WHERE Staff_ID=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 0) 
        {
            header("Location: viewstaff.php");
        }
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Profile</span>
        </div>

        <div class="main-container">
            <div class="left-container">
                <img src="images/profile.png">
                <p>Work Shifts</p>
                <ul class="shift">
                    <li>Monday - 9:00am to 5pm</li>
                    <li>Tuesday - 9:00am to 5pm</li>
                    <li>Wednesday - 9:00am to 5pm</li>
                    <li>Thursday - 9:00am to 5pm</li>
                    <li>Friday - 9:00am to 5pm</li>
                    <li><input type="submit" class="btn" value="View Attendance" style="margin-left: 0px; height: 35px;"></li>
                </ul>
            </div>
            <div class="right-container">
                <form action="includes/deletestaff.php?staffid=<?php echo $id?>" method="post">
                <p class="name"><?php echo $row['name'];?><input name="delete-submit" type="submit" class="btn" value="Delete" style="margin-left: 10px; height: 35px;"> </p>
                </form>
                <p class="job-title"><?php echo $row['role'];?></p>

                <p class="section">About</p>

                <p class="title">Contact Information</p>
                <div class="content">
                    <div class="content-left">
                        <p>Phone:</p>
                        <p>Address:</p>
                        <p>Email:</p>
                    </div>
                    <div class="content-right">
                        <p><?php echo $row['phone'];?></p>
                        <p><?php echo $row['address'];?></p>
                        <p><?php echo $row['email'];?></p>
                    </div>
                </div>  
                <p class="title">Basic Information</p>
                <div class="content">
                    <div class="content-left">
                        <p>Birthday:</p>
                        <p>Gender:</p>
                    </div>
                    <div class="content-right">
                        <p><?php echo $row['dob'];?></p>
                        <p><?php echo $row['gender'];?></p>
                    </div>
                </div>

                <p class="section">Leave (Latest)</p>

                <table class="leavetable">
                <tr>
                    <th style="width: 25%;">Date</th>
                    <th>Reason</th>
                    <th style="width: 20%;">Status</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM leaves WHERE Staff_ID=$id ORDER BY leavedate DESC LIMIT 10";
                    $results = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($results)){
                ?>  
                <tr>
                    <td><?php echo $row['leavedate']?></td>
                    <td><?php echo $row['reason']?></td>
                    <td><?php echo $row['status']?></td>
                </tr>
                <?php } ?>
                </table>
            </div>  
        </div>
    </div>
</body>