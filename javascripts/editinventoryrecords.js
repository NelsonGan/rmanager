function closeModal(){
    document.getElementById("modalwrapper").style.display = "none";
    document.getElementById("quantitymodal").style.display = "none";
}

function showModal(invID){
    document.getElementById("modalwrapper").style.display = "block";
    document.getElementById("quantitymodal").style.display = "block";
    document.getElementById("invID").value = invID;
}

function goBack() {
    document.getElementById("back").click();
}