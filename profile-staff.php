<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/profile-staff.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    
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
                </ul>
            </div>
            <div class="right-container">
                <p class="name">Muhammad Ali <input type="submit" class="btn" value="Update" style="margin-left: 10px; height: 35px;"> </p>
                <p class="job-title">Full-Time Staff</p>

                <p class="section">About</p>

                <p class="title">Contact Information</p>
                <div class="content">
                    <div class="content-left">
                        <p>Phone:</p>
                        <p>Address:</p>
                        <p>Email:</p>
                    </div>
                    <div class="content-right">
                        <p>017-687-4028</p>
                        <p>2, Jalan Gahsing, Cheras</p>
                        <p>mail2001@gmail.com</p>
                    </div>
                </div>  
                <p class="title">Basic Information</p>
                <div class="content">
                    <div class="content-left">
                        <p>Birthday:</p>
                        <p>Gender:</p>
                    </div>
                    <div class="content-right">
                        <p>June 23, 2001</p>
                        <p>Male</p>
                    </div>
                </div>  

                <p class="section">Leave (30 Days History)</p>

                <table class="leavetable">
                <tr>
                    <th style="width: 25%;">Date</th>
                    <th>Reason</th>
                    <th style="width: 20%;">Status</th>
                </tr>
                <tr>
                    <td>25 December 2020</td>
                    <td>Celebrate Christmas</td>
                    <td>Pending Approval</td>
                </tr>
                <tr>
                    <td>2 December 2020</td>
                    <td>Return to hometown</td>
                    <td>Declined</td>
                </tr>
                </table>

                <input type="submit" class="btn" value="Apply Leave" style="margin: 15px 0px; height: 35px; width: 130px; padding: 2px;">

            </div>  
        </div>
    </div>
</body>