<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

include '../includes/header.php';
include '../config/config.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, name, email, gender, contact, address, profile_image FROM customers WHERE id = :id";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":id", $user_id);
oci_execute($stid);

$row = oci_fetch_assoc($stid);

// For debug only — remove after confirming keys
// echo '<pre>';
// print_r($row);
// echo '</pre>';

$profile_image = !empty($row['PROFILE_IMAGE']) ? "../uploads/customers/" . $row['PROFILE_IMAGE'] : "https://via.placeholder.com/128";

?>


<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Customer Profile</h1>

    <div class="columns is-centered">
      <div class="column is-12-mobile is-8-tablet is-6-desktop">

        <div class="box has-text-centered">

          <!-- Profile Image on Top -->
          <!-- <figure class="image is-128x128 is-inline-block mb-4">
            <img class="is-rounded" src="<?= htmlspecialchars($profile_image) ?>" alt="Profile Image">
          </figure> -->

          <div class="has-text-centered mb-5">
            <figure class="image is-128x128 is-inline-block">
              <img class="is-rounded" style="object-fit: cover; width: 128px; height: 128px;" src="<?= htmlspecialchars($profile_image) ?>" alt="Profile Image">
            </figure>
          </div>


          <!-- Details Below Image -->
          <div class="content has-text-left is-flex is-flex-direction-column is-align-items-center">
            <p><strong>Name:</strong> <?= htmlspecialchars($row['NAME'] ?? 'Not specified') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($row['EMAIL'] ?? 'Not specified') ?></p>
            <p><strong>Gender:</strong> <?= htmlspecialchars($row['GENDER'] ?? 'Not specified') ?></p>
            <p><strong>Contact:</strong> <?= htmlspecialchars($row['CONTACT'] ?? 'Not specified') ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($row['ADDRESS'] ?? 'Not specified') ?></p>
          </div>

          <!-- Buttons -->
          <div class="buttons is-centered mt-4">
            <a href="customer-settings.php" class="button is-primary">Edit Profile</a>
            <a href="../config/logout.php" class="button is-danger">Logout</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>



<?php include '../includes/footer.php'; ?>