<!DOCTYPE html>
<head>
    <title>Scheduler</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/schedule.css" rel="stylesheet" type="text/css">
    <script src="javascripts/schedule.js"></script>
</head>

<body>
    <?php include "sidebar.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Staff Schedule</span>
        </div>

        <center>
            <p class="toptext">Weekly Schedule for 3 January 2020 until 4 January 2020</p>

            <button class="btn" style="margin-top: 20px;" onclick="showModal('shift')"><i class="fas fa-plus"></i> &nbsp; Add Shift</button>

            <table class="timetable">
                <tr id="HeaderRow">
                    <td width="10%;">Monday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Tuesday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Wednesday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Thursday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Friday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Saturday <br> <span class="date">(23/1/2020)</span></td>
                    <td width="10%;">Sunday <br> <span class="date">(23/1/2020)</span></td>
                </tr>

                <tr>
                    <td id="Monday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                            <button class="removeshift">Remove shift</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                           
                        </div>

                        
                    </td>

                    <td id="Tuesday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>

                    <td id="Wednesday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>

                    <td id="Thursday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>

                    <td id="Friday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>

                    <td id="Saturday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>

                    <td id="Sunday" class="day">
                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>

                        <div class="shift">
                            <p><strong>Shift: </strong></p>
                            <p style="font-size: 18px;">0800 to 1200</p>
                            <p><strong>Staff Assigned: </strong></p>
                            <p style="font-size: 18px;">John Smith</p>

                            <button class="addstaff">Manage Staff</button>
                        </div>
                    </td>
                </tr>
            </table>
        </center>
    </div>

    <div onclick="closeModal()" id="modalwrapper"></div>
    
    <div id="shiftmodal">
        <form action="includes/addshift.php" method="POST">
            <center>
            <p class="modaltitle">Add New Shift</p>

            <span class="formlabels">Day: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <select class="inputtext" name="shiftday" required>
                <option value="">--Select a day--</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select> <br>

            <span class="formlabels">Start Time: </span>
            <input type="time" class="inputtime" id="starttime" onchange="setEndMin()" required></input><br>

            <span class="formlabels">End Time:&nbsp;&nbsp;</span>
            <input type="time" class="inputtime" id="endtime" required></input> <br>

            <button type="submit" class="submitbutton" name="add">Confirm</button>
            </center>
        </form>
    </div>

    <div id="staffmodal">
        <form action="includes/addsupplier.php" method="POST">
            <center>
            <p class="modaltitle">Add New Supplier</p>

            <span class="formlabels">Company Name: </span>
            <input type="text" name="suppliername" class="inputtext" required> <br>
            
            <span class="formlabels">Phone Number: &nbsp;</span>
            <input type="text" name="supplierphone" class="inputtext" required> <br>
            
            <span class="formlabels">Email Address: &nbsp;&nbsp;</span>
            <input type="text" name="supplieremail" class="inputtext" required> <br>
            
            <span class="formlabels">Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <input type="text" name="supplieraddress" class="inputtext" required> <br>
            
            <button type="submit" class="submitbutton" name="add">Confirm</button>
            </center>
        </form>
    </div>
</body>