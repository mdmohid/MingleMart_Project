<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php?redirect=cart.php");
  exit();
}

$customer_id = $_SESSION['user_id'];
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

if ($product_id > 0 && $quantity > 0) {
  // Check if the product is already in the cart
  $checkSql = "SELECT quantity FROM carts WHERE id = :id AND product_id = :product_id";
  $checkStmt = oci_parse($conn, $checkSql);
  oci_bind_by_name($checkStmt, ":id", $customer_id);
  oci_bind_by_name($checkStmt, ":product_id", $product_id);
  oci_execute($checkStmt);

  if ($row = oci_fetch_assoc($checkStmt)) {
    // Product exists in cart: update quantity
    $updateSql = "UPDATE carts SET quantity = quantity + :quantity WHERE id = :id AND product_id = :product_id";
    $updateStmt = oci_parse($conn, $updateSql);
    oci_bind_by_name($updateStmt, ":quantity", $quantity);
    oci_bind_by_name($updateStmt, ":id", $customer_id);
    oci_bind_by_name($updateStmt, ":product_id", $product_id);
    oci_execute($updateStmt);
    oci_free_statement($updateStmt);
  } else {
    // Insert new row into cart
    $insertSql = "INSERT INTO carts (id, product_id, quantity) VALUES (:id, :product_id, :quantity)";
    $insertStmt = oci_parse($conn, $insertSql);
    oci_bind_by_name($insertStmt, ":id", $customer_id);
    oci_bind_by_name($insertStmt, ":product_id", $product_id);
    oci_bind_by_name($insertStmt, ":quantity", $quantity);
    oci_execute($insertStmt);
    oci_free_statement($insertStmt);
  }

  // Get slug from product_id
  $slugQuery = "SELECT slug FROM products WHERE product_id = :product_id";
  $slugStmt = oci_parse($conn, $slugQuery);
  oci_bind_by_name($slugStmt, ":product_id", $product_id);
  oci_execute($slugStmt);
  $slugRow = oci_fetch_assoc($slugStmt);
  $slug = $slugRow['SLUG'];

  oci_free_statement($checkStmt);
  oci_free_statement($slugStmt);
  oci_close($conn);

  $_SESSION['cart_success'] = "Product added to cart successfully!";
  header("Location: ../trader/product-detail.php?slug=" . urlencode($slug) . "&added=1");
  exit();
} else {
  echo "<p style='color:red;'>Invalid product selected.</p>";
}
