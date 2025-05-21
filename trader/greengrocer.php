<?php
include '../includes/header.php';
include '../config/config.php'; // Include database configuration

// Fetch greengrocer products (assuming trader_id = 3 for greengrocer products)
$sql = "SELECT product_id, product_name, price, image_url, slug FROM products WHERE trader_id = 3";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

$products = [];
while ($row = oci_fetch_assoc($stid)) {
  $products[] = $row;
}
oci_free_statement($stid);
oci_close($conn); // Close the database connection
?>

<section class="section">
  <div class="container">

    <!-- Shop By Category -->
    <h2 class="title is-4">Shop By Category</h2>
    <div class="columns is-multiline mb-5">
      <div class="column is-2 has-text-centered">
        <a href="../trader/bakery.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/bakery.jpg" alt="Bakery" />
          </div>
          <p>Bakery</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/butchers.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/butchers.jpg" alt="Butcher" />
          </div>
          <p>Butcher</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/greengrocer.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/greengrpcers.jpg" alt="Greengrocer" />
          </div>
          <p>Greengrocer</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/delicatessen.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/delicatessen.jpg" alt="Delicatessen" />
          </div>
          <p>Delicatessen</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/fishmonger.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/fishmonger.jpg" alt="Fishmonger" />
          </div>
          <p>Fishmonger</p>
        </a>
      </div>
    </div>

    <!-- Category Images Style -->
    <style>
      .category-image {
        width: 120px;
        height: 120px;
        margin: 0 auto 10px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #ddd;
        transition: all 0.3s ease;
      }

      .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .category-link:hover .category-image {
        transform: scale(1.05);
        border-color: #3273dc;
        box-shadow: 0 4px 12px rgba(50, 115, 220, 0.4);
      }
    </style>

    <div class="columns">
      <!-- Sidebar Filters -->
      <aside class="column is-3">
        <div class="box">
          <h4 class="title is-5">Select & Shop</h4>
          <ul style="list-style-type: disc; padding-left: 1.5rem;">
            <li>
              <i class="fas fa-fish mr-2" style="color: #363636;"></i>
              <a href="fishmonger.php">Fishmonger</a>
            </li>
            <li>
              <i class="fas fa-cheese mr-2" style="color: #363636;"></i>
              <a href="delicatessen.php">Delicatessen</a>
            </li>
            <li>
              <i class="fas fa-drumstick-bite mr-2" style="color: #363636;"></i>
              <a href="butchers.php">Butcher</a>
            </li>
            <li>
              <i class="fas fa-bread-slice mr-2" style="color: #363636;"></i>
              <a href="bakery.php">Bakery</a>
            </li>
            <li>
              <i class="fas fa-apple-alt mr-2" style="color: #363636;"></i>
              <a href="greengrocer.php">Greengrocer</a>
            </li>
          </ul>
        </div>
      </aside>

      <!-- Product Grid -->
      <div class="column is-9">
        <h4 class="title is-5">Greengrocer Products</h4>
        <div class="columns is-multiline" id="product-list">
          <?php if (empty($products)): ?>
            <p>No products found.</p>
          <?php else: ?>
            <?php foreach ($products as $product): ?>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="<?php echo htmlspecialchars($product['IMAGE_URL']); ?>" alt="<?php echo htmlspecialchars($product['PRODUCT_NAME']); ?>">
                    </figure>
                  </div>
                  <div class="card-content">
                    <p class="subtitle is-6"><i class="fas fa-store"></i> Greengrocer Shop</p>
                    <p class="title is-6"><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></p>
                    <p class="has-text-weight-bold">$<?php echo number_format($product['PRICE'], 2); ?></p>
                    <p class="has-text-warning">★★★★★</p>
                    <div class="buttons mt-2">
                      <a href="product-detail.php?slug=<?php echo urlencode($product['SLUG']); ?>" class="button is-small is-link">View Details</a>

                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?php include '../includes/footer.php'; ?>