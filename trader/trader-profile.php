<?php
session_start();
require '../config/config.php';
include '../includes/header.php';

if (!isset($_SESSION['trader_id'])) {
  header("Location: login-trader.php");
  exit();
}

$trader_id = $_SESSION['trader_id'];

// Fetch trader details
$query = "SELECT name, email, gender, contact, address, profile_image FROM traders WHERE trader_id = :id";
$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ":id", $trader_id);
oci_execute($statement);
$row = oci_fetch_assoc($statement);

// Default image fallback
$profile_image = !empty($row['PROFILE_IMAGE']) ? "../uploads/traders/" . $row['PROFILE_IMAGE'] : "https://via.placeholder.com/128";
?>

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Trader Profile</h1>

    <div class="box has-text-centered">
      <figure class="image is-128x128 is-inline-block">
        <img class="is-rounded" src="<?= htmlspecialchars($profile_image) ?>" alt="Profile Image">
      </figure>

      <div class="content mt-5">
        <p><strong>Name:</strong> <?= htmlspecialchars($row['NAME']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($row['EMAIL']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($row['GENDER']) ?></p>
        <p><strong>Contact:</strong> <?= htmlspecialchars($row['CONTACT']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($row['ADDRESS']) ?></p>
      </div>
    </div>

    <div class="has-text-centered">
      <a href="trader-settings.php" class="button is-primary mt-4">Edit Profile</a>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>