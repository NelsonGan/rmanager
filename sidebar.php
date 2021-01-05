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
            $_SESSION['role'] == "Full-time Staff";
            if ($_SESSION['role'] == 'Owner') { ?>
                <li><a href='cart.php'>Cart</a></li>
                <li><a href='account.php'>Account</a></li>
            <?php }
            else { ?>
                <li><a href="checkin.php"><i class="fas fa-user-friends"></i>Attendance</a></li>
                <li><a href="leaverequestform.php"><i class="fas fa-copy"></i>Apply Leave</a></li>
                <li><a href="table.php"><i class="fas fa-shopping-cart"></i>Take Order</a></li>
                <li><a href="inventory.php"><i class="fas fa-warehouse"></i>Manage Inventory</a></li>
                <li><a href="profile-staff"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#" onclick="openDrop()"><i class="fas fa-map-pin"></i>Dropdown</a></li>
                <div class="dropdown-container" id="todrop">
                        <a href="#" >Link 1</a>
                        <a href="#" >Link 2</a>
                        <a href="#" >Link 3</a>
                </div>
            <?php } ?>
        </ul> 
    </div>
</body>
