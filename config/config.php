<?php
$conn = oci_connect('mdmohid', 'root', 'localhost/XE');
if (!$conn) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
  echo "Connected successfully!";
}
