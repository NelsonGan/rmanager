<!DOCTYPE html>
<head>
    <title>Default Title</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/addstaff.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include "sidebar.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Add Staff</span>
        </div>

        <div class="container">
            <p class="name">Enter Information</p>
                <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error-message">Email exists!</p>';
                    }
                    elseif (isset($_GET['add'])) {
                        echo '<p class="success-message">Added staff successfully!</p>';
                    }
                ?>   
                <div class="content">
                    <div class="content-left">
                        <p>Name:</p>
                        <p>Email:</p>
                        <p>Password:</p>
                        <p>Gender:</p>
                        <p>Birthday:</p>
                        <p>Phone:</p>
                        <p>Address:</p>
                        <p>Role:</p>
                    </div>
                    <div class="content-right">
                <form action="includes/addstaff.php" method="post"> 
                        <input type="textbox" name="name" required><br>
                        <input type="email" name="email" required><br>
                        <input type="password" name="pwd" required><br>
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>                        
                        <input type="date" name="dob" required><br>
                        <input type="textbox" name="phone" required><br>
                        <input type="textbox" name="address" required><br>
                        <select name="role" required>
                            <option value="Full-time Staff">Full-time</option>
                            <option value="Part-time Staff">Part-time</option>
                        </select><br>
                    </div>
                </div>  

                <input name="add-submit" type="submit" class="btn" value="Add" style="margin-top: 10px; height: 35px;"> 
                </form>
        </div>  

    </div>
</body>