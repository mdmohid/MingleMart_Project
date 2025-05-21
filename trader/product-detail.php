<?php
include '../includes/header.php';
include '../config/config.php'; // Include database configuration

// Check if slug is provided
if (!isset($_GET['slug'])) {
  die("Invalid product.");
}
$slug = $_GET['slug'];

// Fetch product from database
$sql = "SELECT product_id, trader_id, product_name, description, price, image_url FROM products WHERE slug = :slug";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':slug', $slug);
oci_execute($stid);

$product = oci_fetch_assoc($stid);
if (!$product) {
  die("Product not found.");
}
oci_free_statement($stid);
oci_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?> - Product Details</title>
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title is-3 has-text-centered"><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></h1>
      <div class="columns is-centered">
        <div class="column is-8">
          <div class="card">
            <div class="card-content">
              <div class="columns">
                <!-- Product Image -->
                <div class="column is-5">
                  <figure class="image is-4by3">
                    <img src="<?php echo htmlspecialchars($product['IMAGE_URL']); ?>" alt="<?php echo htmlspecialchars($product['PRODUCT_NAME']); ?>">
                  </figure>
                </div>
                <!-- Product Details -->
                <div class="column is-7">
                  <p class="subtitle is-5"><i class="fas fa-store"></i> Butcher Shop</p>
                  <p class="title is-4"><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></p>
                  <p class="has-text-weight-bold has-text-primary is-size-5">$<?php echo number_format($product['PRICE'], 2); ?></p>
                  <p class="has-text-warning">★★★★★</p>
                  <p class="mt-4"><?php echo nl2br(htmlspecialchars($product['DESCRIPTION'])); ?></p>
                  <form action="../customer/add-tocart.php" method="post" class="mt-5">
                    <input type="hidden" name="product_id" value="<?php echo $product['PRODUCT_ID']; ?>">
                    <div class="field has-addons">
                      <div class="control">
                        <label class="label">Quantity:</label>
                        <input class="input" type="number" name="quantity" value="1" min="1" style="width: 100px;">
                      </div>
                      <div class="control">
                        <button type="submit" class="button is-primary"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include '../includes/footer.php'; ?>
</body>

</html>