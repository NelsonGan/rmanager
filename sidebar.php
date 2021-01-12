<head>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="stylesheets/sidebar.css">
    <script src="javascripts/sidebar.js"></script>
</head>

<body>
    <?php session_start() ?>
    <div class="sidebar">
        <img src="images/logo.png" style="height: 20%; margin-bottom: 30px;">
        <ul>
        <?php
            $_SESSION['role'] == "Owner";
            if ($_SESSION['role'] == 'Owner') { ?>
                <li><a href="viewstaff.php"><i class="fas fa-user-friends"></i>&nbsp;Manage Staff</a></li>
                <li><a href="viewleave.php"><i class="fas fa-copy"></i>&nbsp;Leave Applications</a></li>
                <li><a href="schedule.php"><i class="fas fa-calendar-alt"></i>&nbsp;Staff Schedule</a></li>
                <li><a href="salesreport.php"><i class="fas fa-file-alt"></i>&nbsp;Sales Report</a></li>
                <li><a href="manageinventory.php"><i class="fas fa-warehouse"></i>&nbsp;Manage Inventory</a></li>
                <li><a href="managemenu.php"><i class="fas fa-utensils"></i>&nbsp;Menu Management</a></li>
            <?php }
            else { ?>
                <li><a href="checkin.php"><i class="fas fa-user-friends"></i>Attendance</a></li>
                <li><a href="leaverequestform.php"><i class="fas fa-copy"></i>Apply Leave</a></li>
                <li><a href="table.php"><i class="fas fa-shopping-cart"></i>Take Order</a></li>
                <li><a href="inventorymainpage.php"><i class="fas fa-warehouse"></i>Manage Inventory</a></li>
                <li><a href="profile-staff"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#" onclick="openDrop()"><i class="fas fa-map-pin"></i>Dropdown</a></li>
                <div class="dropdown-container" id="todrop">
                        <a href="#" >Link 1</a>
                        <a href="#" >Link 2</a>
                        <a href="#" >Link 3</a>
                </div>
            <?php } ?>
            <li><a href="includes/signout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
        </ul> 
    </div>
</body>
