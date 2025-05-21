<?php
session_start();
include '../config/config.php';
include '../includes/header.php';

// Check customer login
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$customer_id = $_SESSION['user_id'];

// Fetch cart items for the customer
$sql = "
  SELECT 
    p.product_name, 
    p.price, 
    c.quantity, 
    (p.price * c.quantity) AS subtotal
  FROM carts c
  JOIN products p ON c.product_id = p.product_id
  WHERE c.id = :customer_id
";

$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":customer_id", $customer_id);
oci_execute($stid);

$cartItems = [];
$total = 0;

while ($row = oci_fetch_assoc($stid)) {
  $cartItems[] = $row;
  $total += $row['SUBTOTAL'];
}
?>

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Your Cart</h1>

    <?php if (empty($cartItems)): ?>
      <div class="notification is-warning has-text-centered">
        Your cart is empty.
      </div>
    <?php else: ?>
      <div class="box">
        <table class="table is-fullwidth is-striped is-hoverable">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price ($)</th>
              <th>Quantity</th>
              <th>Subtotal ($)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cartItems as $item): ?>
              <tr>
                <td><?= htmlspecialchars($item['PRODUCT_NAME']) ?></td>
                <td>$<?= number_format($item['PRICE'], 2) ?></td>
                <td><?= $item['QUANTITY'] ?></td>
                <td>$<?= number_format($item['SUBTOTAL'], 2) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <th colspan="3" class="has-text-right">Total:</th>
              <th>$<?= number_format($total, 2) ?></th>
            </tr>
          </tbody>
        </table>

        <div class="has-text-centered mt-4">
          <a href="checkout.php" class="button is-primary">Proceed to Checkout</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php
oci_free_statement($stid);
oci_close($conn);
include '../includes/footer.php';
?>