<?php

require "conn.php";
if(isset($_POST["deleteitem"])){
$itemname = $_POST['ditemname'];

$sql = "DELETE FROM menu WHERE Name = '$itemname' ";
mysqli_query($con,$sql);

echo'<script>alert("1 Record Delete");
window.location.href = "http://localhost:8080/Rmanager/managemenu.php";
</script>';
}

?>
