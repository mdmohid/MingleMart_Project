<!-- 
    <section class="section">
        <h1 class="title">Checkout</h1>
        <div class="tabs">
            <ul>
                <li><a>Address</a></li>
                <li><a>Shipping</a></li>
                <li class="is-active"><a>Payment</a></li>
            </ul>
        </div>
        <div class="columns">
            <div class="column is-8">
                <div class="box">
                    <div class="buttons">
                        <button class="button is-primary">PayPal</button>
                        <button class="button is-dark">Credit Card</button>
                    </div>
                    <h2 class="subtitle">Payment Details</h2>
                    <form action="invoice.php" method="POST">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Card Number</label>
                            <div class="control">
                                <input class="input" type="text" name="card_number" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-dark is-fullwidth" type="submit">Pay Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-4">
                <div class="box">
                    <h2 class="subtitle">Your Cart</h2>
                    <div class="columns">
                        <div class="column is-4">
                            <figure class="image is-64x64">
                                <img src="https://via.placeholder.com/64x64" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: L</p>
                            <p>$99</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <figure class="image is-64x64">
                                <img src="https://via.placeholder.com/64x64" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: S</p>
                            <p>$89</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                    <p><strong>$189</strong></p>
                </div>
            </div>
        </div>
    </section>


 -->

<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php?redirect=checkout.php");
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

include '../includes/header.php';
?>

<section class="section">
  <div class="container">
    <h1 class="title is-3">Checkout</h1>

    <?php if (count($cartItems) > 0): ?>
      <div class="table-container">
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

      <!-- Checkout button -->
      <button class="button is-primary is-medium" id="checkoutButton">
        <span class="icon"><i class="fas fa-credit-card"></i></span>
        <span>Place Order</span>
      </button>

      <!-- Modal -->
      <div class="modal" id="confirmationModal">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Confirm Your Order</p>
            <button class="delete" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <p>Your total is <strong>$<?= number_format($total, 2) ?></strong>.</p>
            <p>Do you want to proceed with placing the order?</p>
          </section>
          <footer class="modal-card-foot">
            <!-- <form method="post" action="place-order.php">
              <button class="button is-success" type="submit">Yes, Place Order</button>
            </form> -->
            <!-- ✅ NEW: Redirect to invoice.php instead -->
            <a href="https://www.paypal.com/" class="button is-success">Yes, Continue to Payment through paypal</a>
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

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('confirmationModal');
    const checkoutButton = document.getElementById('checkoutButton');
    const closeButtons = modal.querySelectorAll('.delete, .cancel-button');

    checkoutButton.addEventListener('click', () => {
      modal.classList.add('is-active');
    });

    closeButtons.forEach(button => {
      button.addEventListener('click', () => {
        modal.classList.remove('is-active');
      });
    });
  });
</script>