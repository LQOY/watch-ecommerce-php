<?php

extract($_POST);  
include("dbconnect.php");
$sql ="insert into products(product_name, model_no, price, overview, image_1, image_2, image_3, image_4) values('$product_name', '$model_no', '$price', '$overview', '$image_1', '$image_2', '$image_3', '$image_4')";

mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)===1)
    header("Location:management.php?message='Product added sucessfully.'");
else
    header("Location:management.php?message='Error. Product not added.'");
?>