<!DOCTYPE html>
<head>
    <title>Profile</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/profile-staff.css" rel="stylesheet" type="text/css">
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
                </ul>
            </div>
            <div class="right-container">
                <p class="name"><?php echo $row['name'];?><a href="updateprofile.php" class="btn" style="width: 30px; margin-left: 10px; height: 35px; font-weight: normal;" >Update</a></p>
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
                <p class="section">Leave Application (Latest)</p>

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
                <?php }?>
                </table>

                <a href="leaverequestform.php" type="submit" class="btn" style="margin: 15px 0px; height: 35px; width: 120px; padding: 5px;">Apply Leave</a>

            </div>  
        </div>
    </div>
</body>