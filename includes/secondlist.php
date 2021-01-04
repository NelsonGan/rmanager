<?php
include ("conn.php");
$id = $_POST['product_1_id'];
$sql = "SELECT * FROM menu WHERE Item_ID= $id";
$result = mysqli_query($con, $sql);
$option1 = '';

while ($row = $result->fetch_assoc()) {
    //$option1 .= '<option value = "'.$row['value'].'">'.$row['value'].'</option>';
    $number = $row['Price'];
    $string= number_format((float)$number, 2, '.', '');
    $option1 .= '<input type="text" class="form-control" name="price1" id="price1" value="' . $string . '"   readonly >';
}

$output = '<div class="formGroupExampleInput"> ';
$output .= '<div> <label for="price">Unit Price (RM)</label></div>';
$output .= $option1;
$output .= '</div> ';
echo $output;
exit;
