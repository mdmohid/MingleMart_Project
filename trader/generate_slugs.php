<!-- <?php
include '../config/config.php';

function generateSlug($name)
{
  // Convert to lowercase, replace non-alphanumeric with hyphens, trim hyphens
  $slug = preg_replace('/[^a-z0-9]+/i', '-', strtolower($name));
  return trim($slug, '-');
}

// Fetch all products
$sql = "SELECT product_id, product_name FROM products";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

// Prepare update statement
$update_sql = "UPDATE products SET slug = :slug WHERE product_id = :pid";
$update_stid = oci_parse($conn, $update_sql);

// Loop through products and update slugs
while ($row = oci_fetch_assoc($stid)) {
  $slug = generateSlug($row['PRODUCT_NAME']);
  $pid = $row['PRODUCT_ID'];

  oci_bind_by_name($update_stid, ':slug', $slug);
  oci_bind_by_name($update_stid, ':pid', $pid);
  oci_execute($update_stid);
}

echo "Slugs updated successfully.";

oci_close($conn); -->
