<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php?redirect=invoice.php");
  exit();
}

$customer_id = $_SESSION['user_id'];

// Fetch cart items
$sql = "SELECT p.product_name, p.price, c.quantity, (p.price * c.quantity) AS subtotal
        FROM carts c
        JOIN products p ON c.product_id = p.product_id
        WHERE c.id = :id";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ":id", $customer_id);
oci_execute($stmt);

$cartItems = [];
$total = 0;

while ($row = oci_fetch_assoc($stmt)) {
  $cartItems[] = $row;
  $total += $row['SUBTOTAL'];
}
oci_free_statement($stmt);
oci_close($conn);
?>

<?php include '../includes/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title is-3">Invoice & Payment</h1>

    <?php if (count($cartItems) > 0): ?>
      <div class="box">
        <h2 class="subtitle">Order Summary</h2>
        <table class="table is-fullwidth is-striped">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
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
      </div>

      <!-- Payment Options -->
      <div class="box has-text-centered">
        <h2 class="subtitle">Choose Payment Method</h2>
        <button class="button is-primary is-medium" id="payNowBtn">
          <span class="icon"><i class="fas fa-credit-card"></i></span>
          <span>Pay Now</span>
        </button>
      </div>

      <!-- Modal -->
      <div class="modal" id="paymentModal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Complete Your Payment</p>
            <button class="delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body has-text-centered">
            <p class="mb-4">Total: <strong>$<?= number_format($total, 2) ?></strong></p>
            <!-- PayPal Button -->
            <div id="paypal-button-container"></div>
            <p class="mt-4">or</p>
            <a href="credit-card.php" class="button is-dark mt-3">Pay with Credit/Debit Card</a>
          </section>
          <footer class="modal-card-foot">
            <button class="button cancel-button">Cancel</button>
          </footer>
        </div>
      </div>

    <?php else: ?>
      <div class="notification is-warning">Your cart is empty.</div>
    <?php endif; ?>
  </div>
</section>

<?php include '../includes/footer.php'; ?>

<!-- ✅ PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID_HERE&currency=USD"></script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('paymentModal');
    const payNowBtn = document.getElementById('payNowBtn');
    const closeBtns = modal.querySelectorAll('.delete, .cancel-button');

    payNowBtn.addEventListener('click', () => {
      modal.classList.add('is-active');
    });

    closeBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        modal.classList.remove('is-active');
      });
    });

    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= number_format($total, 2, '.', '') ?>'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Payment completed by ' + details.payer.name.given_name + '!');
          window.location.href = 'place-order.php';
        });
      }
    }).render('#paypal-button-container');
  });
</script>