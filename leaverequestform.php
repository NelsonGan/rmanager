<!DOCTYPE html>
<head>
    <title>Leave Application</title>
    <link rel="stylesheet" href="stylesheets/leaverequestform.css"> 
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.php";?>

    <?php
    require ("includes/conn.php");
    $id = $_SESSION['Staff_ID'];
    $sql = "SELECT name FROM staff WHERE Staff_ID=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Leave Application</span>
        </div>
        
        <center>
        <div class="staffInfo">
        <?php 
            if (isset($_GET['submit'])) 
            {
                echo '<p style="margin-top:20px; color: green;">Successfully submitted leave request form</p>';
            }
            ?>
            <img src="images/blacklogo.png">
            <h2 style="margin: 25px 0px"><?php echo $row['name']?></h2>
        </div>
        <hr style="width: 70%;">
        </center>
        
        <h1 style="margin-top: 30px;">Leave Request Form</h1>
        <form action="includes/addleave.php" method="post">
            <center>
            <div class="dateSection">
                <label for="date">Date:</label>
                <input style="height: 35px;" type="date" name="date" required><br>
            </div>
            <div class="commentSection">
                <label for="comment">Reason:</label>
                <textarea style="width: 400px; height: 70px; padding: 5px;" rows="4" cols="50" name="reason" required></textarea><br>
            </div>
            <input type="submit" value="Submit" class="btn" name='submit'>
            </center>
        </form>
    </div>
</body>