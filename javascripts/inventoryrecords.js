function submit() {
    document.getElementById("submitform").click();
}

function setYearIndex(targetyear){
    var options, indextoset;
    //code to get the number of options in the list
    options = document.getElementById("yearselect").length;
    for (var i = 0; i < options; i++){
        //code to get the option value
        if (document.getElementById('yearselect').options[i].value == targetyear){
            indextoset = i;
        }
    }
    //sets the select index with the matching index to the year in POST
    document.getElementById("yearselect").selectedIndex = indextoset;
}

function setMonthIndex(targetmonth){
    var options, indextoset;
    //code to get the number of options in the list
    options = document.getElementById("monthselect").length;
    for (var i = 0; i < options; i++){
        //code to get the option value
        if (document.getElementById('monthselect').options[i].value == targetmonth){
            indextoset = i;
        }
    }
    //sets the select index with the matching index to the year in POST
    document.getElementById("monthselect").selectedIndex = indextoset;
}

function checkMonth(month){
    var options, refreshpage;
    //code to get the number of options in the list
    options = document.getElementById("monthselect").length;
    refreshpage = true;
    for (var i = 0; i < options; i++){
        //code to get the option value
        if (document.getElementById('monthselect').options[i].value == month){
            refreshpage = false;
        }
    }
    //sets the select index with the matching index to the year in POST
    if (refreshpage == true){
        submit();
    } 
}

