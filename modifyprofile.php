<!DOCTYPE html>
<head>
    <title>Update Profile</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/updateprofile.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include "sidebar.php"; ?>

    <?php
        require ("includes/conn.php");
        $id = $_GET['staffid'];
        $sql = "SELECT * FROM staff WHERE Staff_ID=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Update Profile</span>
        </div>

        <div class="container">
            <form action="includes/modifyprofile.php" method="post">
                <p class="name"><?php echo $row['name'];?></p>
                <?php
                if (isset($_GET['update'])) {
                    echo '<p class="success-message">Account updated successfully!</p>';
                }
                ?>   
                    <div class="content">
                        <div class="content-left">
                            <p>Name:</p>
                            <p>Password:</p>
                            <p>Gender:</p>
                            <p>Birthday:</p>
                            <p>Role:</p>
                            <p>Phone:</p>
                            <p>Address:</p>
                            <p>Hourly Rate:</p>

                        </div>
                        <div class="content-right">
                            <input type="hidden" name="staffid" value="<?php echo $id?>">
                            <input name="name" type="textbox" value="<?php echo $row['name'];?>" required><br>
                            <input name="password" type="textbox" value="<?php echo $row['pwd'];?>" required><br>
                            <select name="gender" required>
                            <option value="Male" <?php if ($row['gender'] == "Male") echo 'selected="selected"'?>>Male</option>
                            <option value="Female" <?php if ($row['gender'] == "Female") echo 'selected="selected"'?>>Female</option>
                            </select><br>
                            <input type="date" name="dob" value="<?php echo $row['dob'];?>" required><br>
                            <select name="role" required>
                            <option value="Full-time Staff" <?php if ($row['role'] == "Full-time Staff") echo 'selected="selected"'?>>Full-time</option>
                            <option value="Part-time Staff" <?php if ($row['role'] == "Part-time Staff") echo 'selected="selected"'?>>Part-time</option>
                            </select><br>                                           
                            <input name="phone" type="textbox" value="<?php echo $row['phone'];?>" required><br>
                            <input name="address" type="textbox" value="<?php echo $row['address'];?>" required><br>
                            <input name="hourlyrate" type="number" min="1" max="1000" value="<?php echo $row['hourlyrate'];?>" required><br>
                        </div>
                    </div>  
                    <input name="submit-update" type="submit" class="btn" value="Update" style="margin-top: 10px; height: 35px;">
            </form> 
        </div>  

    </div>
</body>