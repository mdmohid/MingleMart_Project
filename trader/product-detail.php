<?php
session_start();
include '../config/config.php';

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
  header('Location: ../trader/butchers.php');
  exit;
}
$slug = $_GET['slug'];

// Fetch product details
$sql = "SELECT product_id, trader_id, product_name, description, price, image_url FROM products WHERE slug = :slug";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ':slug', $slug);
oci_execute($stid);

$product = oci_fetch_assoc($stid);
if (!$product) {
  header('Location: ../trader/butchers.php');
  exit;
}
oci_free_statement($stid);
oci_close($conn);

// Get cart success message (if any)
$cart_success = isset($_SESSION['cart_success']) ? $_SESSION['cart_success'] : '';
unset($_SESSION['cart_success']);

include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?> - Product Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
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
                <div class="column is-5">
                  <figure class="image is-4by3">
                    <img src="<?php echo htmlspecialchars($product['IMAGE_URL']); ?>" alt="<?php echo htmlspecialchars($product['PRODUCT_NAME']); ?>">
                  </figure>
                </div>
                <div class="column is-7">
                  <p class="subtitle is-5"><i class="fas fa-store"></i> Butcher Shop</p>
                  <p class="title is-4"><?php echo htmlspecialchars($product['PRODUCT_NAME']); ?></p>
                  <p class="has-text-weight-bold has-text-primary is-size-5">$<?php echo number_format($product['PRICE'], 2); ?></p>
                  <p class="has-text-warning">★★★★★</p>
                  <p class="mt-4"><?php echo nl2br(htmlspecialchars($product['DESCRIPTION'])); ?></p>
                  <form action="../customer/add-tocart.php" method="post" class="mt-5">
                    <input type="hidden" name="product_id" value="<?php echo $product['PRODUCT_ID']; ?>">
                    <div class="field">
                      <label class="label">Quantity:</label>
                      <div class="control">
                        <input class="input" type="number" name="quantity" value="1" min="1" style="width: 100px;">
                      </div>
                    </div>
                    <div class="field is-grouped mt-3">
                      <div class="control">
                        <button type="submit" class="button is-primary is-medium">
                          <span class="icon">
                            <i class="fas fa-cart-plus"></i>
                          </span>
                          <span>Add to Cart</span>
                        </button>
                      </div>
                      <div class="control">
                        <a href="../customer/invoice.php" class="button is-success is-medium">
                          <span class="icon">
                            <i class="fas fa-shopping-bag"></i>
                          </span>
                          <span>Buy Now</span>
                        </a>
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

  <!-- Bulma Modal -->
  <div class="modal" id="successModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title has-text-success">Success</p>
        <button class="delete" aria-label="close" id="modalClose"></button>
      </header>
      <section class="modal-card-body">
        <p><?php echo htmlspecialchars($cart_success); ?></p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" id="modalCloseFooter">OK</button>
      </footer>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const modal = document.getElementById('successModal');
      const closeButtons = document.querySelectorAll('#modalClose, #modalCloseFooter');

      // Show modal only if cart_success exists
      <?php if (!empty($cart_success)): ?>
        modal.classList.add('is-active');
      <?php endif; ?>

      // Close modal logic
      closeButtons.forEach(button => {
        button.addEventListener('click', () => {
          modal.classList.remove('is-active');
        });
      });
    });
  </script>
</body>

</html>