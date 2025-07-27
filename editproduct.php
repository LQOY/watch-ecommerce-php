<?php
// if not login, redirect to login page
session_start();
if (!isset($_SESSION['username'])){
    header("Location:login.php");
}
extract($_GET);
include("dbconnect.php");
$sql = "select product_id, product_name, model_no, price, overview, image_1, image_2, image_3, image_4 from products where product_id=$product_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
 

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
    <h2>Product Management System - Edit Product</h2>
    <!-- form -->
    <form class="mx-5" action="updateproduct.php" method="post">
    <!-- hidden product id -->
     <input hidden type="text" name="product_id" value="<?php echo $row['product_id']?>">
    <!--name  -->
    <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['product_name']?>">
    </div>
    <!-- model number -->
    <div class="mb-3">
        <label for="model_no" class="form-label">Model Number</label>
        <input type="text" class="form-control" id="model_no" name="model_no" value="<?php echo $row['model_no']?>">
    </div>
    <!-- price -->
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']?>">
    </div>
    <!-- overview -->
    <div class="mb-3">
        <label for="overview" class="form-label">Overview</label>
        <textarea class="form-control" id="overview" rows="5" name="overview"><?php echo $row['overview']?></textarea>
    </div>
<!-- images -->
    <div class="mb-3">
        <label for="image_1" class="form-label">Product image 1</label>
        <input type="text" class="form-control" id="image_1" name="image_1" value="<?php echo $row['image_1']?>">
    </div>
    <div class="mb-3">
        <label for="image_2" class="form-label">Product image 2</label>
        <input type="text" class="form-control" id="image_2" name="image_2" value="<?php echo $row['image_2']?>">
    </div>
    <div class="mb-3">
        <label for="image_3" class="form-label">Product image 3</label>
        <input type="text" class="form-control" id="image_3" name="image_3" value="<?php echo $row['image_3']?>">
    </div>
    <div class="mb-3">
        <label for="image_4" class="form-label">Product image 4</label>
        <input type="text" class="form-control" id="image_4" name="image_4" value="<?php echo $row['image_4']?>">
    </div> 
    
    <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
        
     
  </body>
</html>