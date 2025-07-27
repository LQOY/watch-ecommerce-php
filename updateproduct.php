<?php

extract($_POST);  
include("dbconnect.php");
$sql ="update products set product_name='$product_name', model_no='model_no', price='$price', overview='$overview', image_1='$image_1', image_2='$image_2', image_3='$image_3', image_4='$image_4' where product_id =$product_id ";

mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)===1)
    header("Location:management.php?message='Product updated sucessfully.'");
else
    header("Location:management.php?message='Error. Product not updated.'");
?>
 