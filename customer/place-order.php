<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php?redirect=checkout.php");
  exit();
}

$customer_id = $_SESSION['user_id'];

// 1. Fetch cart items again to save the order
$sql = "SELECT product_id, quantity FROM carts WHERE id = :id";
$stmt = oci_parse($conn, $sql);
oci_bind_by_name($stmt, ":id", $customer_id);
oci_execute($stmt);

$cartItems = [];
while ($row = oci_fetch_assoc($stmt)) {
  $cartItems[] = $row;
}
oci_free_statement($stmt);

if (count($cartItems) == 0) {
  // No items in cart
  $_SESSION['order_error'] = "Your cart is empty.";
  header("Location: checkout.php");
  exit();
}

// 2. Insert new order (simplified)
$orderSql = "INSERT INTO orders (customer_id, order_date) VALUES (:customer_id, SYSDATE) RETURNING order_id INTO :order_id";
$orderStmt = oci_parse($conn, $orderSql);
oci_bind_by_name($orderStmt, ":customer_id", $customer_id);
oci_bind_by_name($orderStmt, ":order_id", $order_id, -1, SQLT_INT);
oci_execute($orderStmt, OCI_DEFAULT);
oci_commit($conn); // commit insert
oci_free_statement($orderStmt);

// 3. Insert order items
$orderItemSql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)";
foreach ($cartItems as $item) {
  $stmt = oci_parse($conn, $orderItemSql);
  oci_bind_by_name($stmt, ":order_id", $order_id);
  oci_bind_by_name($stmt, ":product_id", $item['PRODUCT_ID']);
  oci_bind_by_name($stmt, ":quantity", $item['QUANTITY']);
  oci_execute($stmt, OCI_DEFAULT);
  oci_free_statement($stmt);
}
oci_commit($conn);

// 4. Clear the cart
$clearSql = "DELETE FROM carts WHERE id = :id";
$clearStmt = oci_parse($conn, $clearSql);
oci_bind_by_name($clearStmt, ":id", $customer_id);
oci_execute($clearStmt, OCI_DEFAULT);
oci_commit($conn);
oci_free_statement($clearStmt);

oci_close($conn);

// 5. Redirect to invoice or thank you page
header("Location: invoice.php?order_id=" . $order_id);
exit();
