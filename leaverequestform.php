<!DOCTYPE html>
<head>
    <title>Leave Application</title>
    <link rel="stylesheet" href="stylesheets/leaverequestform.css"> 
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "sidebar.html"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Leave Application</span>
        </div>
        
        <center>
        <div class="staffInfo">
            <img src="images/blacklogo.png" alt="temp">
            <h2 style="margin-top: 25px;">Staff name</h2>
            <h3 style="margin-top: 15px; margin-bottom: 25px;">Position</h3>
        </div>
        <hr style="width: 70%;">
        </center>
        
        <h1 style="margin-top: 30px;">Leave Request Form</h1>
        <form>
            <center>
            <div class="dateSection">
                <label for="date">Date:</label>
                <input type="date" name="date"><br>
            </div>
            <div class="commentSection">
                <label for="comment">Reason:</label>
                <textarea rows="4" cols="50" name="comment">Enter text here...</textarea><br>
            </div>
            <input type="submit" value="Submit" class="btn">
            </center>
        </form>
    </div>
</body>