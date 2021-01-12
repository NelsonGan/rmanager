function delItem(itemname,itemcode){
    if (confirm("Are you sure you want to delete" + itemname + " (Item Code: " + itemcode + ")?") == true){
        document.getElementById("itemtext").value = itemcode;
        document.getElementById("submitdel").click();
    }
}
//this code clicks the hidden form on the manageinventory.php page