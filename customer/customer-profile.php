<?php
session_start();
include '../includes/header.php';
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, name, email, gender, contact, address, profile_image FROM customers WHERE id = :id";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":id", $user_id);
oci_execute($stid);

$row = oci_fetch_assoc($stid);

$profile_image = !empty($row['PROFILE_IMAGE']) ? "../uploads/customers/" . $row['PROFILE_IMAGE'] : "https://via.placeholder.com/128";

?>

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Customer Profile</h1>

    <div class="box has-text-centered">
      <figure class="image is-128x128 is-inline-block">
        <img class="is-rounded" src="<?= htmlspecialchars($profile_image) ?>" alt="Profile Image">
      </figure>

      <div class="content mt-5">
        <p><strong>Name:</strong> <?= htmlspecialchars($row['NAME']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($row['EMAIL']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($row['GENDER'] ?? 'Not specified') ?></p>
        <p><strong>Contact:</strong> <?= htmlspecialchars($row['CONTACT'] ?? 'Not specified') ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($row['ADDRESS'] ?? 'Not specified') ?></p>
      </div>
    </div>

    <div class="has-text-centered">
      <a href="customer-settings.php" class="button is-primary mt-4">Edit Profile</a>
      <a href="logout.php" class="button is-danger mt-4 ml-3">Logout</a>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>