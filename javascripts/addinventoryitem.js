function closeModal(){
    document.getElementById("modalwrapper").style.display = "none";
    document.getElementById("locationmodal").style.display = "none";
    document.getElementById("suppliermodal").style.display = "none";
}

function showModal(div){
    document.getElementById("modalwrapper").style.display = "block";
    if (div == "location"){
        document.getElementById("locationmodal").style.display = "block";
    } else {
        document.getElementById("suppliermodal").style.display = "block";
    }
}