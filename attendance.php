<!DOCTYPE html>
<head>
    <title>Attendance</title>
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
        $totalhour = 0;
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Attendance</span>
        </div>  
        <div class="container">
            <center>
            <br>
            <form action="attendance.php?staffid=<?php echo $id?>" method="POST">
                Select Date:
                <input type="month" style="width: 200px; height: 30px;" id="selectdate" name="selectdate" onchange=submit(); 
                value="<?php if (isset($_POST['selectdate']))echo $_POST['selectdate'];?>">
            </form>

            <?php 
            if (isset($_POST['selectdate']))
            {
                $selecteddate = explode ("-", $_POST['selectdate']);
                $sql = "SELECT *, ROUND(TIME_TO_SEC(TIMEDIFF(clockout, clockin))/3600,2) AS working_hour FROM attendance 
                WHERE Staff_ID = '$id' AND MONTH(workdate) ='$selecteddate[1]' AND YEAR(workdate) = '$selecteddate[0]'";
                $results = mysqli_query($con, $sql);
                if (mysqli_num_rows($results) > 0) 
                {
            ?>
                <table class="attendancetable">
                    <tr>
                        <th style="width: 33%;">Date</th>
                        <th style="width: 33%;">Clocked In</th>
                        <th style="width: 33%;">Clocked Out</th>
                        <th style="width: 33%;">Hours Worked</th>
                    </tr>
                    <?php

                        while ($row = mysqli_fetch_assoc($results)){
                    ?>
                    <tr>
                        <td><?php echo $row['workdate']?></td>
                        <td><?php echo $row['clockin']?></td>
                        <td>
                        <?php 
                        if (isset($row['clockout'])) 
                            echo $row['clockout'];
                        else 
                            echo "Not clocked out";
                        ?>
                        </td>
                        <td>
                        <?php 

                        if (isset($row['clockout'])) 
                        {
                            echo $row['working_hour'];
                            $totalhour += $row['working_hour'];
                        }
                        else
                            echo '0';
                        ?>
                        </td>
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
            <?php
                }
            else
            {   
                echo "<p style='color:red; margin: 20px; font-size: 21px;'>No result found!</p>";
            }?>
        </div>
        <?php
        } 
        ?>
    </div>
</body>