<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/checkin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Attendance</span>
        </div>

        <div class="container">
                <center>
                    <p>25/11/2020</p>
                    <p>8:35PM</p>
                    <input type="submit" class="btn" value="Clock In" style="height: 35px; width: 130px; padding: 2px;">

                <table class="attendancetable">
                <tr>
                    <th style="width: 33%;">Date</th>
                    <th style="width: 33%;">Time</th>
                    <th style="width: 33%;">Status</th>
                    <th style="width: 33%;">Hours Worked</th>
                </tr>
                <tr>
                    <td>25 December 2020</td>
                    <td>6:00PM</td>
                    <td>Clocked Out</td>
                    <td rowspan="2" style="text-align: center;">9</td>
                </tr>
                <tr>
                    <td>25 December 2020</td>
                    <td>9:00AM</td>
                    <td>Clocked In</td>
                </tr>
                </table>
                </center>   
        </div>



    </div>
</body>