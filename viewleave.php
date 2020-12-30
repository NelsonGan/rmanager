<!DOCTYPE html>
<head>
    <title>Leave Applications</title>
    
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="stylesheets/viewleave.css">
</head>

<body>
    <?php include "sidebar.html"; ?>
    
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
                                <button class = "btn" id = "approve">Approve</button>
                                <button  class = "btn" id = "decline">Decline</button>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </center>
    </div>
</body>