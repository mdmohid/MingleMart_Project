<?php
session_start();
require '../config/config.php'; // Update to your actual connection file path

if (!isset($_SESSION['trader_id'])) {
  header("Location: login-trader.php");
  exit();
}

$trader_id = $_SESSION['trader_id'];
$success = "";
$error = "";

// Fetch current trader data
$query = "SELECT name, email, profile_image FROM traders WHERE trader_id = :id";
$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ":id", $trader_id);
oci_execute($statement);
$row = oci_fetch_assoc($statement);

// On form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $profile_image = $row['PROFILE_IMAGE'];

  // Handle profile image upload
  if (!empty($_FILES['profile_image']['name'])) {
    $image_name = basename($_FILES['profile_image']['name']);
    $target_dir = "../uploads/traders/";
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
      $profile_image = $image_name;
    } else {
      $error = "Failed to upload image.";
    }
  }

  // Update the trader info
  $update = "UPDATE traders SET name = :name, email = :email, profile_image = :image WHERE trader_id = :id";
  $stmt = oci_parse($conn, $update);
  oci_bind_by_name($stmt, ":name", $name);
  oci_bind_by_name($stmt, ":email", $email);
  oci_bind_by_name($stmt, ":image", $profile_image);
  oci_bind_by_name($stmt, ":id", $trader_id);

  if (oci_execute($stmt)) {
    $success = "Profile updated successfully.";
    $row['NAME'] = $name;
    $row['EMAIL'] = $email;
    $row['PROFILE_IMAGE'] = $profile_image;
  } else {
    $error = "Update failed.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Trader Profile Settings</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">Trader Profile Settings</h1>

      <?php if ($success): ?>
        <div class="notification is-success"><?= $success ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="notification is-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" enctype="multipart/form-data">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" type="text" name="name" value="<?= htmlspecialchars($row['NAME']) ?>" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input" type="email" name="email" value="<?= htmlspecialchars($row['EMAIL']) ?>" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Profile Image</label>
          <?php if ($row['PROFILE_IMAGE']): ?>
            <figure class="image is-128x128 mb-2">
              <img class="is-rounded" src="../uploads/traders/<?= htmlspecialchars($row['PROFILE_IMAGE']) ?>" alt="Profile Image">
            </figure>
          <?php endif; ?>
          <div class="control">
            <input type="file" name="profile_image">
          </div>
        </div>

        <div class="field">
          <div class="control">
            <button class="button is-primary" type="submit">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</body>

</html>