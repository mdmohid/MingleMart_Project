<?php
include('../../config/config.php');

$search = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

echo "<h3 class='title is-4'>Search Results for \"{$search}\"</h3>";

if ($search) {
  $sql = "SELECT * FROM products WHERE LOWER(product_name) LIKE '%' || :search || '%'";
  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ":search", $search);
  oci_execute($stmt);

  $found = false;
  while ($row = oci_fetch_assoc($stmt)) {
    echo "<div class='box'>
                <strong>{$row['PRODUCT_NAME']}</strong><br>
                Price: {$row['PRICE']}<br>
                Category: {$row['CATEGORY']}
              </div>";
    $found = true;
  }

  if (!$found) {
    echo "<p>No results found for <strong>{$search}</strong>.</p>";
  }
} else {
  echo "<p>No search query provided.</p>";
}
