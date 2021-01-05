<?php
$con = mysqli_connect("localhost","root","","rmanager","3306");


// if (mysqli_connect_errno())
// {
//     echo "Failed to Connect MySQL:".mysqli_connect_error();
// }
// else{
//     echo "MySQL server connected";
 if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
