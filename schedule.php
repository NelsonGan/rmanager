<!DOCTYPE html>
<head>
    <title>Scheduler</title>
    <link href="stylesheets/default.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/schedule.css" rel="stylesheet" type="text/css">
    <script src="javascripts/schedule.js"></script>
</head>

<body>
    <?php include "sidebar.php"; ?>
    <?php include "includes/conn.php"; ?>
    <?php include "includes/conversionfunctions.php"; ?>
    
    <div class="mainbody">
        <div class="topbar">
            <span>Staff Schedule</span>
        </div>

        <center>
            <?php 
            if (isset($_GET['added'])){
                if ($_GET['added'] == 1){
                    echo '<p class="newnote">Shift added.</p>';
                } else {
                    echo '<p class="failednote">Failed to add shift.</p>';
                }
            } elseif (isset($_GET['deleted'])){
                if ($_GET['deleted'] == 1) {
                    echo '<p class="newnote">Shift deleted.</p>';
                } else {
                    echo '<p class="failednote">Failed to delete shift.</p>';
                }
            }
            ?>
            
            <?php 
            $strtoconvert = (1 - date('w'))." days";
            $monday = date("d/m/Y", strtotime($strtoconvert));

            $strtoconvert = (2 - date('w'))." days";
            $tuesday = date("d/m/Y", strtotime($strtoconvert)); 

            $strtoconvert = (3 - date('w'))." days";
            $wednesday = date("d/m/Y", strtotime($strtoconvert)); 

            $strtoconvert = (4 - date('w'))." days";
            $thursday = date("d/m/Y", strtotime($strtoconvert)); 

            $strtoconvert = (5 - date('w'))." days";
            $friday = date("d/m/Y", strtotime($strtoconvert)); 

            $strtoconvert = (6 - date('w'))." days";
            $saturday = date("d/m/Y", strtotime($strtoconvert)); 

            $strtoconvert = (7 - date('w'))." days";
            $sunday = date("d/m/Y", strtotime($strtoconvert)); 
            ?>

            <?php 
            $textmonday = explode("/", $monday);
            $textsunday = explode("/", $sunday);
            $titlemonday = $textmonday[0]." ".ReturnNumToMonth($textmonday[1])." ".$textmonday[2];
            $titlesunday = $textsunday[0]." ".ReturnNumToMonth($textsunday[1])." ".$textsunday[2];
            ?>
            <p class="toptext">Weekly Schedule for <?php echo $titlemonday?> until <?php echo $titlesunday?></p>

            <button class="btn" style="margin-top: 20px;" onclick="showModal()"><i class="fas fa-plus"></i> &nbsp; Add Shift</button>
            
            <table class="timetable">
                <tr id="HeaderRow">
                    <td width="10%;">Monday <br> <span class="date">(<?php echo $monday ?>)</span></td>
                    <td width="10%;">Tuesday <br> <span class="date">(<?php echo $tuesday ?>)</span></td>
                    <td width="10%;">Wednesday <br> <span class="date">(<?php echo $wednesday ?>)</span></td>
                    <td width="10%;">Thursday <br> <span class="date">(<?php echo $thursday ?>)</span></td>
                    <td width="10%;">Friday <br> <span class="date">(<?php echo $friday ?>)</span></td>
                    <td width="10%;">Saturday <br> <span class="date">(<?php echo $saturday ?>)</span></td>
                    <td width="10%;">Sunday <br> <span class="date">(<?php echo $sunday ?>)</span></td>
                </tr>
                
                <tr> <!--START DISPLAYING THE SHIFTS-->
                <?php
                $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                for ($i = 0; $i < 7; $i++){
                    $day = $days[$i]; ?>    
                    <td id="<?php echo $day; ?>" class="day">
                        <?php 
                        $sql = "SELECT * FROM shifts WHERE shiftday = '".$day."'";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($shift = mysqli_fetch_assoc($result)){?>
                                <div class="shift">
                                    <p><strong>Shift: </strong></p>
                                    <p style="font-size: 18px;"><?php echo $shift['starttime'] ?> to <?php echo $shift['endtime'] ?></p>
                                    <p><strong>Staff Assigned: </strong></p>
                                    <?php
                                    $sql = "SELECT staff.Staff_ID, staff.name FROM schedule LEFT JOIN staff ON schedule.Staff_ID = staff.Staff_ID WHERE Shift_ID = ".$shift['Shift_ID'];
                                    $stafflist = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($stafflist) > 0){
                                        while ($staff = mysqli_fetch_assoc($stafflist)){
                                            echo '<p style="font-size: 18px;">'.$staff['name'].'</p>';
                                        }
                                    } else {
                                        echo "<span style='font-size: 15px'>--No staff assigned--</span>";
                                    }
                                    ?>
                                    <button class="addstaff" id="<?php echo $shift['Shift_ID'] ?>" onclick="location.href='schedule.php?shift=<?php echo $shift['Shift_ID'] ?>';">Manage Staff</button>
                                    <button class="removeshift" onclick="removeShift('<?php echo $shift['Shift_ID'];?>', )">Remove shift</button>
                                </div>
                            <?php }?>
                        <?php } else { ?>
                            <p style="margin-top: 20px">-no shifts-</p>
                        <?php } ?>                
                    </td>
                <?php }
                ?> 
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
            <input type="time" class="inputtime" id="starttime" name="shiftstart" onchange="setEndMin()" required></input><br>

            <span class="formlabels">End Time:&nbsp;&nbsp;</span>
            <input type="time" class="inputtime" id="endtime" name="shiftend" required></input> <br>

            <button type="submit" class="submitbutton" name="add">Confirm</button>
            </center>
        </form>
    </div>
    
    <?php 
    if (isset($_GET['shift'])){ ?>
        <div onclick="location.href='schedule.php';" id="staffmodalwrapper"></div>
        <div id="staffmodal">
            <form action="includes/managestaffshift.php" method="POST">
                <center>
                <p class="modaltitle">Assign Staff</p>
                <input type="hidden" name="shiftid" id="shifttoedit" value="<?php echo $_GET['shift'] ?>"></input>
                <input type="hidden" name="toAdd" id="toAdd" value="null"></input>
                <input type="hidden" name="toRemove" id="toRemove" value="null"></input>
                <div class="assignstaff">
                    <?php 
                    $sql = "SELECT * FROM staff ORDER BY name";
                    $result = mysqli_query($con, $sql);
                    while ($staff = mysqli_fetch_assoc($result)){
                        $sql = "SELECT * FROM schedule WHERE Staff_ID = ".$staff['Staff_ID']." AND Shift_ID = ".$_GET['shift'];
                        $result2 = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result2) > 0){ ?>
                            <input id="<?php echo $staff['Staff_ID'] ?>" type="checkbox" onchange="editStaffCommand(this.id)" checked>
                        <?php } else { ?>
                            <input id="<?php echo $staff['Staff_ID'] ?>" type="checkbox" onchange="editStaffCommand(this.id)">
                        <?php } ?>
                        <label for="<?php echo $staff['Staff_ID'] ?>"><?php echo $staff['name'] ?></label>
                        <br>
                    <?php } ?>
                </div>
                <button type="submit" class="submitbutton" name="add">Confirm</button>
                </center>
            </form>
        </div>
    <?php } ?>
    

    <div id="hiddenform">
        <form action="includes/deleteshift.php" method="POST">
            <input type="hidden" name="shiftid" id="hiddenvalue"></input>
            <button type="submit" id="hiddenbutton"></button>
        </form>
    </div>
</body>