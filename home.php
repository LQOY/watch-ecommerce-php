<?php
include("dbconnect.php");
extract($_GET);
if (isset($searchkeyword)){
  $sql = "select product_id, product_name, price, image_1 from products where product_name like '%$searchkeyword%' ";
}
else{
$sql = "select product_id, product_name, price, image_1 from products";}
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
    <title>Melbourne Watch Gallery</title>
  </head>
  <body onload="display_cart()">
    <!-- Navigation bar -->
    <?php
    session_start();
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

    <div class="main_container">
      <div class="products_container">

        <?php
        while ($row = mysqli_fetch_array($result)){
          echo "
          <div class='product'>
                  <a href='product.php?product_id=$row[product_id]'>
                  <h2>$row[product_name]</h2>
                  <img src='$row[image_1]' alt=''>
                  </a> 

                  <div class='product_info'>
                  <h2>$<span>$row[price]</span></h2>
                  <button onclick='add_product(this)' class='btn btn-info'>Add to Cart</button>
                  </div>
                </div>
                
                ";
        }
        ?>
        
    </div>     
   

      <div class="shopping_cart">
        <h2 class="shopping_cart_title">Shopping Cart</h2>
<div id="shopping_cart_items"> 
        
  <!-- 1
   <div class="cart_item_container">
          <img src="https://www.jbhifi.com.au/cdn/shop/files/754669-Product-0-I-638562549002342947.jpg?v=1720658173" alt="">
          <h3>Samsung Galaxy Watch7 40mm</h3>
          <h3>$549</h3>
          <button class="btn btn-secondary">Remove</button>
        </div>
 2 
        <div class="cart_item_container">
          <img src="https://www.jbhifi.com.au/cdn/shop/files/678225-Product-0-I-638439793204804257_e0aaeae2-ec19-4022-b80d-607d7c469463.jpg?v=1712548814" alt="">
          <h3>Ryze Wave Smart Watch MP3</h3>
          <h3>$549</h3>
          <button class="btn btn-secondary">Remove</button>
        </div>
 3  
          <div class="cart_item_container">
          <img src="https://www.jbhifi.com.au/cdn/shop/products/623862-Product-0-I-638102508441099303.jpg?v=1674614492" alt="">
          <h3>Garmin Vivomove Trend Smart Watch</h3>
          <h3>$499</h3>
          <button class="btn btn-secondary">Remove</button>
        </div> -->
       
</div>
        <div class="total_row">
        <h2>Total</h2>
        <h2>$<span>0</span> </h2>
        </div>
        <button class="btn btn-success" >Check out<span id="count" class="badge text-bg-secondary">3</span></button>
        
      </div>
 </div>
  </body>
</html>
