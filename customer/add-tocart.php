<?php
session_start();
include 'config.php';

// Validate inputs
if (!isset($_POST['product_id'], $_POST['quantity'])) {
  die("Invalid request.");
}

$product_id = (int)$_POST['product_id'];
$quantity = (int)$_POST['quantity'];

if ($quantity < 1) {
  die("Invalid quantity.");
}

// Optionally, verify product exists before adding to cart
$sql = "SELECT product_id, product_name, price FROM products WHERE product_id = :pid";
$stid = oci_parse($db_conn, $sql);
oci_bind_by_name($stid, ':pid', $product_id);
oci_execute($stid);
$product = oci_fetch_assoc($stid);

if (!$product) {
  die("Product not found.");
}

// Initialize cart session if not set
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Add or update product in cart
if (isset($_SESSION['cart'][$product_id])) {
  $_SESSION['cart'][$product_id]['quantity'] += $quantity;
} else {
  $_SESSION['cart'][$product_id] = [
    'product_name' => $product['PRODUCT_NAME'],
    'price' => $product['PRICE'],
    'quantity' => $quantity
  ];
}

// Redirect back to product page or cart page
header("Location: product_detail.php?id=$product_id&added=1");
exit;

<?php include '../includes/header.php'; ?>



<?php include '../includes/footer.php'; ?>