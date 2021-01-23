<?php
require "conn.php";
if(isset($_POST["editsubmit"])){
if($_POST["eimg"]==""){
$sql = "UPDATE menu SET
Name='$_POST[eitemname]',
Type='$_POST[eitemtype]',
Price='$_POST[eitemprice]',
Description='$_POST[edescription]'
WHERE Item_ID='$_POST[eitemid]';";

}
else{
  $sql = "UPDATE menu SET
  Name='$_POST[eitemname]',
  Type='$_POST[eitemtype]',
  Price='$_POST[eitemprice]',
  Description='$_POST[edescription]',
  item_img='$_POST[eimg]'
  WHERE Item_ID='$_POST[eitemid]';";

}
if (mysqli_query($con, $sql)) {
mysqli_close($con);

echo'<script>alert("Item Edited");
window.location.href = "http://localhost:8080/Rmanager/managemenu.php";
</script>';
}
}
?>
