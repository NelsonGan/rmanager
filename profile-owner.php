<!DOCTYPE html>
<head>
    <title>Profile</title>
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
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Monday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Tuesday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Wednesday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Thursday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Friday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Saturday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                <?php 
                    $sqlmon = "SELECT * FROM schedule LEFT JOIN shifts ON schedule.Shift_ID = shifts.Shift_ID WHERE schedule.Staff_ID = '$id' AND shifts.shiftday = 'Sunday';";
                    $resultmon = mysqli_query($con,$sqlmon);
                    while ($rowmon = mysqli_fetch_assoc($resultmon)){
                ?>
                    <li><?php echo $rowmon['shiftday'];?> - <?php echo $rowmon['starttime'];?> to <?php echo $rowmon['endtime'];?></li>
                <?php
                    }
                ?>
                    <li><a href="attendance.php?staffid=<?php echo $row['Staff_ID'];?>" class="btn" style="margin-left: 0px; height: 35px;">View Attendance</a></li>
                    <?php
                        if (isset($_GET['error']))
                        {
                            echo "<li class='error-msg'>No record found!";
                        }
                    ?>
                </ul>
            </div>
            <div class="right-container">
                <form action="includes/deletestaff.php" method="post">
                <p class="name"><?php echo $row['name'];?><input onclick="window.location='modifyprofile.php?staffid=<?php echo $id?>'" class="btn" value="Update" style="width: 90px; margin-left: 10px; height: 35px;"><input name="delete-submit" type="submit" class="btn" value="Delete" style="margin-left: 10px; height: 35px;"></p>
                <input type="hidden" name="staffid" value="<?php echo $id?>"> 
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
                    <th style="width: 20%;">Start Date</th>
                    <th style="width: 20%;">End Date</th>
                    <th>Reason</th>
                    <th style="width: 20%;">Status</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM leaves WHERE Staff_ID=$id ORDER BY startdate DESC LIMIT 10";
                    $results = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($results)){
                ?>
                <tr>
                    <td><?php echo $row['startdate']?></td>
                    <td><?php echo $row['enddate']?></td>
                    <td><?php echo $row['reason']?></td>
                    <td><?php echo $row['status']?></td>
                </tr>
                <?php }?>
                </table>
            </div>  
        </div>
    </div>
</body>