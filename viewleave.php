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
                <table>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Muhammad Ali</td>
                        <td>23/11/20</td>
                        <td>Return to hometown</td>
                        <td>
                            <center>
                            <button class = "btn" id = "approve" onclick="document.getElementById('id01').style.display='block'">Approve</button>
                            <button  class = "btn" id = "decline" onclick="document.getElementById('id01').style.display='block'">Decline</button>
                            </center>
                        </td>
                    </tr>
                </table>
                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content">
                        <div class="container">
                            <h1>Confirmation</h1>
                            <p>Are you sure you want to [action]?</p>
                    
                            <div class="clearfix">
                            <button class="modalBtn" id="yesBtn">Yes</button>
                            <button class="modalBtn" id="noBtn">No</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </center>
    </div>
</body>