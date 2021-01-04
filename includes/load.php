<?php
include ("conn.php");


if(isset($_POST["fname"]))
{
 if($_POST["fname"] == "food_data")
 {
  $query = "
  SELECT * FROM menu 
  ORDER BY Name ASC
  ";
  $result = mysqli_query($con, $query);


  foreach($result as $row)
  {
   $output[] = array(
    'id'  => $row["Item_ID"],
    'name'  => $row["Name"],
    'price' => $row['Price']
   );
  }
  echo json_encode($output);
 }

}

?>