<?php

$con = mysqli_connect("localhost","root","","rmanager","3306");
if(!$con)
{
echo "Connection Not Created";
}
$data[] = array('Day','Sales per Day');
$sql = "SELECT DAYNAME(odatetime) As Day, SUM(netamount) AS Total FROM `orders` GROUP By DAYNAME(odatetime)";
$query = mysqli_query($con,$sql);
while($result = mysqli_fetch_array($query))
{
$data[] = array($result['Day'],(double)$result['Total']);

}
echo json_encode($data);

?>
