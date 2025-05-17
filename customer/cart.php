<?php
session_start();
?>
<?php include '../includes/header.php' ?>

<h1>Your Cart</h1>

<?php if (empty($_SESSION['cart'])): ?>
  <p>Your cart is empty.</p>
<?php else: ?>
  <table border="1" cellpadding="10">
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $item):
      $subtotal = $item['price'] * $item['quantity'];
      $total += $subtotal;
    ?>
      <tr>
        <td><?php echo htmlspecialchars($item['product_name']); ?></td>
        <td>$<?php echo number_format($item['price'], 2); ?></td>
        <td><?php echo $item['quantity']; ?></td>
        <td>$<?php echo number_format($subtotal, 2); ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="3" align="right"><strong>Total:</strong></td>
      <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
    </tr>
  </table>
<?php endif; ?>

<?php include '../includes/footer.php' ?>