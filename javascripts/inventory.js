function filterFunction() {
    var input, filter, numRows, i;
    input = document.getElementById("itemfilter");
    filter = input.value.toUpperCase();

    numRows = document.getElementById("itemlist").rows.length;
    for (i = 1; i < numRows; i++) {
        txtValue = document.getElementById("itemlist").rows[i].cells[1].innerHTML;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            //document.getElementById("itemlist").rows[i].style.display = "";
            checkDropDown(i);
        } else {
            document.getElementById("itemlist").rows[i].style.display = "none";
        }
    }
}

function filterFunctionDrop(){
    var filter;
    filter = document.getElementById("locations").value.toUpperCase();
    if (filter == "ALL"){
        numRows = document.getElementById("itemlist").rows.length;
        for (i = 1; i < numRows; i++) {
            //document.getElementById("itemlist").rows[i].style.display = "";
            checkFilter(i);
        }
    } else {
        numRows = document.getElementById("itemlist").rows.length;
        for (i = 1; i < numRows; i++) {
            txtValue = document.getElementById("itemlist").rows[i].cells[2].innerHTML;
            if (txtValue.toUpperCase() == filter) {
                //document.getElementById("itemlist").rows[i].style.display = "";
                checkFilter(i);
            } else {
                document.getElementById("itemlist").rows[i].style.display = "none";
            }
        }
    }
}

function checkDropDown(i){
    var txtValue, filter;
    txtValue = document.getElementById("itemlist").rows[i].cells[2].innerHTML;
    filter = document.getElementById("locations").value.toUpperCase();
    if (filter == "ALL"){
        document.getElementById("itemlist").rows[i].style.display = "";
    } else {
        if (txtValue.toUpperCase() == filter) {
            document.getElementById("itemlist").rows[i].style.display = "";
        } else {
            document.getElementById("itemlist").rows[i].style.display = "none";
        }
    } 
}

function checkFilter(i){
    var txtValue, filter;
    input = document.getElementById("itemfilter");
    filter = input.value.toUpperCase();
    txtValue = document.getElementById("itemlist").rows[i].cells[1].innerHTML;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        document.getElementById("itemlist").rows[i].style.display = "";
    } else {
        document.getElementById("itemlist").rows[i].style.display = "none";
    }
}