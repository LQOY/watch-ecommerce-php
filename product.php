<?php
include("dbconnect.php");

extract($_GET);
 
$sql = "select product_id, product_name, price, overview, model_no, image_1, image_2, image_3, image_4 from products where product_id = $product_id";
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
<!-- main_container -->
    <div class="main_container">
    <div class="product_container">
    <div>
        <img id="main_image" src="<?php echo $row['image_1']?>" 
        alt="">

        <div class="thumbnail_conatainer">
        <img onmouseover="update_image(this)" src="<?php echo $row['image_2']?>" alt="">

        <img onmouseover="update_image(this)" src="<?php echo $row['image_3']?>" alt="">

        <img onmouseover="update_image(this)" src="<?php echo $row['image_4']?>" alt="">
 
    </div>
    </div>
        <div>
        <h2 id="product_name">
          <?php echo $row['product_name']?>
        </h2>
        <h4 class="model"><?php echo $row['model_no']?></h4>
        <h3>$<span><?php echo $row['price']?></span></h3>
        <button onclick="add_product(this)" class="btn btn-primary">Add to Cart</button>

        <h3 class="product_overview">Product Overview</h3>
        <p><?php echo $row['overview']?></p>
        </div>



    
    </div>

<!-- shopping_cart -->
      <div class="shopping_cart">
        <h2 class="shopping_cart_title">Shopping Cart</h2>
<div id="shopping_cart_items"> 
      
       
</div>
        <div class="total_row">
        <h2>Total</h2>
        <h2>$<span>0</span> </h2>
        </div>
        <button class="btn btn-success">Check out<span id="count" class="badge text-bg-secondary">3</span></button>
        
      </div>
 </div>

  </body>
</html>
