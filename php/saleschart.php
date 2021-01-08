<?php
session_start();

$con = mysqli_connect("localhost","root","","rmanager","3306");
if(!$con)
{
echo "Connection Not Created";
}
$data[] = array('Day','Sales per Day');
if(isset($_GET["filterbtn"])){
$Month = $_GET["monthfilter"];
$sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` Where DATE_FORMAT(odatetime, '%Y-%m') = '$Month' GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
}Else{
$sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` GROUP By DAYNAME(odatetime) ORDER By DAYNAME(odatetime)";
}
$query = mysqli_query($con,$sql);
while($result = mysqli_fetch_array($query))
{
$data[] = array($result['Day'],(double)$result['Total']);
}
$_SESSION['month'] = $data[]
echo json_encode($data);
// echo'<script>alert("Filter Applied");
// window.location.href = "http://localhost:8080/Rmanager/salesreport.php";
// </script>';
?>
