<!DOCTYPE html>
<head>
    <title>Leave Applications</title>
    
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="stylesheets/viewleave.css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Leave Applications</span>
        </div>

        <center>
            <div class="leavetable">
                <table style="width: 70%;">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                    <?php 
                    require "includes/conn.php";
                    $sql = "SELECT * FROM leaves LEFT JOIN staff ON leaves.Staff_ID = staff.Staff_ID WHERE Status='Pending' ORDER BY leavedate ASC";
                    $results = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($results)){
                    ?>
                    <tr>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['leavedate']?></td>
                        <td><?php echo $row['reason']?></td>
                        <td>
                            <center>
                            <form action="includes/approveleave" method="post">
                                <input type="submit" name="approve-submit" class="btn" id ="approve" value="Approve">
                                <input type="submit" name="decline-submit" class="btn" id ="decline" value="Decline">
                                <input type="hidden" name="staffid" value="<?php echo $row['Staff_ID']?>">
                                <input type="hidden" name="leaveid" value="<?php echo $row['Leave_ID']?>">
                            </form>
                            </center>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </center>
    </div>
</body>