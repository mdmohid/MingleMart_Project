 <?php include '../includes/header.php'; ?>


 <?php
  include '../config/config.php';

  // Get product ID from URL
  if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid product ID.");
  }
  $product_id = (int)$_GET['id'];

  // Fetch product from DB
  $sql = "SELECT product_id, trader_id, product_name, description, price, image_url FROM products WHERE product_id = :pid";
  $stid = oci_parse($conn, $sql);
  oci_bind_by_name($stid, ':pid', $product_id);
  oci_execute($stid);

  $product = oci_fetch_assoc($stid);
  if (!$product) {
    die("Product not found.");
  }

  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8" />
   <title><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></title>
 </head>

 <body>
   <h1><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></h1>
   <img src="<?php echo htmlspecialchars($product['IMAGE_URL']); ?>" alt="<?php echo htmlspecialchars($product['PRODUCT_NAME']); ?>" style="max-width:200px;">
   <p><?php echo nl2br(htmlspecialchars($product['DESCRIPTION'])); ?></p>
   <p>Price: $<?php echo number_format($product['PRICE'], 2); ?></p>

   <form action="add_to_cart.php" method="post">
     <input type="hidden" name="product_id" value="<?php echo $product['PRODUCT_ID']; ?>" />
     Quantity: <input type="number" name="quantity" value="1" min="1" />
     <button type="submit">Add to Cart</button>
   </form>


   <?php include '../includes/footer.php'; ?>



 </body>

 </html>