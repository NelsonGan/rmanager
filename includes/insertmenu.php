<?php

require "conn.php";
if(isset($_POST["menusubmit"])){
$itemname = $_POST["itemname"];
$itemprice = $_POST["itemprice"];
$itemtype = $_POST["itemtype"];
$description = $_POST["description"];
$image = $_POST["img"];


$sql = "INSERT INTO menu (Name, Type, Price, Description, item_img) VALUES ('$itemname', '$itemtype', '$itemprice', '$description', '$image')";
mysqli_query($con,$sql);


echo'<script>alert("1 Record Added");
window.location.href = "http://localhost:8080/Rmanager/managemenu.php";
</script>';
}

?>
