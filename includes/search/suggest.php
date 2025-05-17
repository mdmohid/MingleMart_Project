<?php
include('../../config/config.php');

if (isset($_GET['q'])) {
  $query = strtolower(trim($_GET['q']));
  $results = [];

  $sql = "SELECT DISTINCT product_name FROM products WHERE LOWER(product_name) LIKE '%' || :query || '%' FETCH FIRST 5 ROWS ONLY";
  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ":query", $query);
  oci_execute($stmt);

  while ($row = oci_fetch_assoc($stmt)) {
    $results[] = $row['PRODUCT_NAME'];
  }

  echo json_encode($results);
}
