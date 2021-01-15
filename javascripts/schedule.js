function closeModal(){
    document.getElementById("modalwrapper").style.display = "none";
    document.getElementById("shiftmodal").style.display = "none";
    document.getElementById("staffmodal").style.display = "none";
}

function showModal(div){
    document.getElementById("modalwrapper").style.display = "block";
    if (div == "shift"){
        document.getElementById("shiftmodal").style.display = "block";
    } else {
        document.getElementById("staffmodal").style.display = "block";
    }
}

function setEndMin(){
    var time = document.getElementById("starttime").value;
    var components = time.split(":");
    var hour = parseInt(components[0]) + 1;
    var minute = components[1];

    var mintime = hour + ":" + minute
    document.getElementById("endtime").value = mintime;
}