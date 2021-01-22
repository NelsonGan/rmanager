<!DOCTYPE html>
<head>
    <title>Attendance</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/checkin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>
    <?php
        require "includes/conn.php";
        $currentday = date('d');
        $currentmonth = date('m');
        $currentyear = date('Y');
        $id = $_SESSION['Staff_ID'];
        $sql = "SELECT * FROM attendance WHERE Staff_ID = '$id' AND MONTH(workdate) = '$currentmonth' AND YEAR(workdate) = '$currentyear' ORDER BY workdate DESC";
        $result = mysqli_query($con, $sql);
        date_default_timezone_set('Asia/Kuala_Lumpur');
    ?>
    
    
    <div class="mainbody">
        <div class="topbar">
            <span>Attendance</span>
        </div>

        <div class="container">
                <center>
                    <p><?php echo date("d/m/Y"); ?></p>
                    <p><?php echo date("H:i:s");?></p>
                    <form action="includes/clockin.php" method="post">
                    <?php
                        $sql = "SELECT * FROM attendance WHERE Staff_ID = '$id' AND MONTH(workdate) = '$currentmonth' AND YEAR(workdate) = '$currentyear' AND DAY(workdate) = '$currentday'";
                        $condition = mysqli_query($con, $sql);
                        $info = mysqli_fetch_assoc($condition);

                        if (mysqli_num_rows($condition) > 0 && isset($info['clockout']))
                        {
                            echo '<input type="submit" class="btn" value="Clocked Out" style="background-color: #DCDCDC; color: black; cursor: default; height: 35px; width: 130px; padding: 2px;" disabled>';
                        }
                        else if (mysqli_num_rows($condition) > 0) 
                        {
                            echo '<input name="clockout-submit" type="submit" class="btn" value="Clock Out" style="height: 35px; width: 130px; padding: 2px;">';
                        }
                        else
                        {
                            echo '<input name="clockin-submit" type="submit" class="btn" value="Clock In" style="height: 35px; width: 130px; padding: 2px;">';
                        }
                    ?>
                    </form>

                <table class="attendancetable">
                <tr>
                    <th style="width: 25%;">Date</th>
                    <th style="width: 25%;">Clocked In</th>
                    <th style="width: 25%;">Clocked Out</th>
                    <th style="width: 25%;">Hours Worked</th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['workdate'];?></td>
                    <td>
                    <?php 
                        echo $row['clockin'];
                    ?>
                    </td>
                    <td>
                    <?php 
                        if (isset($row['clockout']))
                        {
                            echo $row['clockout'];
                        } 
                        else 
                        {
                            echo "Not clocked out";
                        }
                    ?>
                    </td>                    
                    <td>
                    <?php 
                        $clockin = $row['clockin'];
                        $clockout = $row['clockout'];
                        $clockin2 = strtotime($clockin);
                        $clockout2 = strtotime($clockout);
                        $difference = round(abs($clockout2 - $clockin2) / 3600,2);
                        if (isset($row['clockout']))
                        {
                            echo $difference;
                        } 
                        else 
                        {
                            echo "NA";
                        }
                    ?>
                    </td>
                </tr>
                <?php }; ?>
                </table>
                </center>   
        </div>
    </div>
</body>