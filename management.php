<?php
// if not login, redirect to login page
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}

include("dbconnect.php");

$sql = "select product_id, product_name, price, image_1 from products";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <script src="script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="product.css" />
    <style>
        .table img{
            width: 80px;
        }
    </style>
    <title>Melbourne Watch Gallery</title>
  </head>
  <body onload="display_cart()">
    <!-- Nar Bar -->
    <?php
    include("navbar.php");
    ?>

    <!-- Header -->
    <div class="header">
      <img 
        class="logo"
        src="https://ecs.gbca.edu.au/moodle/images/logo.jpg"
        alt="company logo"
      />
      <h1>Melbourne Watch Gallery</h1>
    </div>
    <h2>Product Management System</h2>
    
    <?php
    extract($_GET);
    if(isset($message))
    echo"
      <div class='mx-5 alert alert-info' role='alert'>
        $message
      </div>";
    ?>

    <table>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = mysqli_fetch_array($result)){
        echo"
        <tr>
        <th scope='row'>$row[product_id]</th>
        <td><img src ='$row[image_1]' alt ='product image'></td>
        <td>$row[product_name]</td>
        <td>$row[price]</td>
        <td><a href='editproduct.php?product_id=$row[product_id]'>Edit</a>, 
        <a href='deleteproduct.php?product_id=$row[product_id]''>Delete</a>, 
        <a href='product.php?product_id=$row[product_id]'>Preview</a></td>
        </tr>
     ";
    }

    ?>

    
     
  </tbody>
</table>
    </table>

     
  </body>
</html>