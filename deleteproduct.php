<?php
    extract($_GET);
    include("dbconnect.php");
    $sql ="delete from products where product_id=$product_id";

    mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)===1)
        header("Location:management.php?message='Product deleted sucessfully.'");
    else
        header("Location:management.php?message='Error. Product not deleted.'");

?>
 