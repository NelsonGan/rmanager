<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/attendance.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>

    <?php
        if (!isset($_GET['staffid']))
        {
            header("Location: viewstaff.php");
        }
        require "includes/conn.php";
        $id = $_GET['staffid'];
        $today = date("Y-m-d");
        $lastyear = date("Y", strtotime("$today -1 months"));
        $lastmonth = date("m", strtotime("$today -1 months"));
        $totalhour = 0;
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Attendance</span>
        </div>  
        <div class="container">
            <center>
                <table class="attendancetable">
                    <tr>
                        <th style="width: 33%;">Date</th>
                        <th style="width: 33%;">Clocked In</th>
                        <th style="width: 33%;">Clocked Out</th>
                        <th style="width: 33%;">Hours Worked</th>
                    </tr>
                    <?php
                        $sql = "SELECT *, ROUND(TIME_TO_SEC(TIMEDIFF(clockout, clockin))/3600,2) AS working_hour FROM attendance WHERE Staff_ID = '$id' AND MONTH(workdate) ='$lastmonth' AND YEAR(workdate) = '$lastyear'";
                        $results = mysqli_query($con, $sql);
                        if (mysqli_num_rows($results) == 0) 
                        {
                            header("Location: profile-owner.php?staffid=$id&error=norecord");
                        }
                        while ($row = mysqli_fetch_assoc($results)){
                    ?>
                    <tr>
                        <td><?php echo $row['workdate']?></td>
                        <td><?php echo $row['clockin']?></td>
                        <td><?php echo $row['clockout']?></td>
                        <td><?php echo $row['working_hour']; $totalhour += $row['working_hour'];?></td>
                    </tr>
                    <?php } ?>
                </table>

                <?php
                    $sql = "SELECT * FROM Staff WHERE Staff_ID = '$id'";
                    $results = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($results);
                    $hourlyrate = $row['hourlyrate'];
                    $totalpaid = $hourlyrate * $totalhour;
                ?>


            </center>

            <div class="profile">
                    <h1>Payment Summary</h1>
                    <table class="details">
                        <tr>
                            <td style="font-weight: bold;">Name:</td>
                            <td><?php echo $row['name'];?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Hours Worked:</td>
                            <td><?php echo $totalhour;?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Hourly Rate:</td>
                            <td>RM<?php echo $hourlyrate;?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Amount Paid:</td>
                            <td>RM<?php echo $totalpaid;?></td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</body>