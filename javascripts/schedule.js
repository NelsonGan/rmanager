function closeModal(){
    document.getElementById("modalwrapper").style.display = "none";
    document.getElementById("shiftmodal").style.display = "none";
}

function showModal(){
    document.getElementById("modalwrapper").style.display = "block";
    document.getElementById("shiftmodal").style.display = "block";
}

function setEndMin(){
    if (document.getElementById("endtime").value == ""){
        var time = document.getElementById("starttime").value;
        var components = time.split(":");
        var hour = parseInt(components[0]) + 1;
        var minute = components[1];

        var mintime = hour + ":" + minute
        document.getElementById("endtime").value = mintime;
    }   
}

function removeShift(shift){
    if (confirm("Are you sure you want to delete this shift?") == true){
        document.getElementById("hiddenvalue").value = shift;
        document.getElementById("hiddenbutton").click();
    }
}

var toAdd = [];
var i = 0;
var toRemove = [];
var j = 0;
function editStaffCommand(id){
    if (document.getElementById(id).checked){
        alert(id + "checked");
        toAdd[i] = id;
        document.getElementById("toAdd").value = toAdd.toString();
        i++;
    } else {
        alert(id + "unchecked");
        toRemove[j] = id;
        document.getElementById("toRemove").value = toRemove.toString();
        j++;
    }
}