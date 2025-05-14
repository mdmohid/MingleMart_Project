<?php
// // Database configuration
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'minglemart');

// // Create connection
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>



<?php
// Replace with actual Oracle credentials and service name
$username = 'your_oracle_username';
$password = 'your_oracle_password';
$connection_string = '//localhost:1521/XEPDB1';  // or your actual service name

$conn = oci_connect($username, $password, $connection_string);

if (!$conn) {
  $e = oci_error();
  die("Connection failed: " . $e['message']);
}
?>
