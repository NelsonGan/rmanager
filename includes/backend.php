<?php
include('conn.php'); 

$searchTerm = $_GET['term']; 
//$sql = "SELECT * FROM orders WHERE orderid LIKE '%".$searchTerm."%' OR customername LIKE '%".$searchTerm."%'"; 
$sql = "SELECT * FROM orders WHERE (orderid LIKE '%$searchTerm%' OR customername LIKE '%$searchTerm%')"; 

$result = mysqli_query($con, $sql); 

//$tutorialData = array(); 

if (mysqli_num_rows($result) > 0) {
    
 while($row = mysqli_fetch_assoc($result)) {
 // $data[] = $row['orderid']; 
 $data[] = $row['customername'];
 $data[] = $row['orderid'];
 //$data['value'] = $row['orderid'];
 //array_push($tutorialData, $data);

 } }
 // Return results as json encoded array
//  echo json_encode($tutorialData);
echo json_encode($data);

?>