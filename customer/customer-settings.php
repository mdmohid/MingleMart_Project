<?php
session_start();
require '../config/config.php'; // Your OCI connection

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$id = $_SESSION['user_id'];
$success = "";
$error = "";

// Fetch current customer data
// $query = "SELECT name, email, profile_image FROM customers WHERE id = :id";
$query = "SELECT name, email, gender, contact, address, profile_image FROM customers WHERE id = :id";

$statement = oci_parse($conn, $query);
oci_bind_by_name($statement, ":id", $id);
oci_execute($statement);
$row = oci_fetch_assoc($statement);

if (!$row) {
  $error = "User data not found.";
}

// // On form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && $row) {
//   $name = $_POST['name'] ?? '';
//   $email = $_POST['email'] ?? '';
//   $profile_image = $row['PROFILE_IMAGE'] ?? null;

//   // Handle profile image upload
//   if (!empty($_FILES['profile_image']['name'])) {
//     $image_name = basename($_FILES['profile_image']['name']);
//     $target_dir = "../uploads/customers/";
//     $target_file = $target_dir . $image_name;

//     if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
//       $profile_image = $image_name;
//     } else {
//       $error = "Failed to upload image.";
//     }
//   }

//   if (!$error) {
//     $update = "UPDATE customers SET name = :name, email = :email, profile_image = :image WHERE id = :id";
//     $stmt = oci_parse($conn, $update);
//     oci_bind_by_name($stmt, ":name", $name);
//     oci_bind_by_name($stmt, ":email", $email);
//     oci_bind_by_name($stmt, ":image", $profile_image);
//     oci_bind_by_name($stmt, ":id", $id);

//     if (oci_execute($stmt)) {
//       $success = "Profile updated successfully.";

//       // Refresh $row with new values for the form
//       $row['NAME'] = $name;
//       $row['EMAIL'] = $email;
//       $row['PROFILE_IMAGE'] = $profile_image;
//     } else {
//       $error = "Update failed.";
//     }
//   }
// }

// After form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $row) {
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $contact = $_POST['contact'] ?? '';
  $address = $_POST['address'] ?? '';
  $profile_image = $row['PROFILE_IMAGE'] ?? null;

  // Image upload code remains same...

  if (!$error) {
    $update = "UPDATE customers SET name = :name, email = :email, gender = :gender, contact = :contact, address = :address, profile_image = :image WHERE id = :id";
    $stmt = oci_parse($conn, $update);
    oci_bind_by_name($stmt, ":name", $name);
    oci_bind_by_name($stmt, ":email", $email);
    oci_bind_by_name($stmt, ":gender", $gender);
    oci_bind_by_name($stmt, ":contact", $contact);
    oci_bind_by_name($stmt, ":address", $address);
    oci_bind_by_name($stmt, ":image", $profile_image);
    oci_bind_by_name($stmt, ":id", $id);

    if (oci_execute($stmt)) {
      $success = "Profile updated successfully.";
      // Refresh $row for form display
      $row['NAME'] = $name;
      $row['EMAIL'] = $email;
      $row['GENDER'] = $gender;
      $row['CONTACT'] = $contact;
      $row['ADDRESS'] = $address;
      $row['PROFILE_IMAGE'] = $profile_image;
    } else {
      $error = "Update failed.";
    }
  }
}


include '../includes/header.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Customer Profile Settings</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">Profile Settings</h1>

      <?php if ($success): ?>
        <div class="notification is-success"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <?php if ($error): ?>
        <div class="notification is-danger"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <?php if ($row): ?>
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
            <label class="label">Gender</label>
            <div class="control">
              <div class="select">
                <select name="gender" required>
                  <option value="" <?= empty($row['GENDER']) ? 'selected' : '' ?>>Select Gender</option>
                  <option value="Male" <?= ($row['GENDER'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                  <option value="Female" <?= ($row['GENDER'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                  <option value="Other" <?= ($row['GENDER'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">Contact</label>
            <div class="control">
              <input class="input" type="text" name="contact" value="<?= htmlspecialchars($row['CONTACT']) ?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Address</label>
            <div class="control">
              <textarea class="textarea" name="address" required><?= htmlspecialchars($row['ADDRESS']) ?></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Profile Image</label>
            <?php if (!empty($row['PROFILE_IMAGE'])): ?>
              <figure class="image is-128x128 mb-2">
                <img class="is-rounded" src="../uploads/customers/<?= htmlspecialchars($row['PROFILE_IMAGE']) ?>" alt="Profile Image">
              </figure>
            <?php endif; ?>
            <div class="control">
              <input type="file" name="profile_image" accept="image/*">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Update Profile</button>
            </div>
          </div>

          <!-- <div class="field">
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
            <?php if (!empty($row['PROFILE_IMAGE'])): ?>
              <figure class="image is-128x128 mb-2">
                <img class="is-rounded" src="../uploads/customers/<?= htmlspecialchars($row['PROFILE_IMAGE']) ?>" alt="Profile Image">
              </figure>
            <?php endif; ?>
            <div class="control">
              <input type="file" name="profile_image" accept="image/*">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Update Profile</button>
            </div>
          </div> -->
        </form>
      <?php else: ?>
        <p>User not found.</p>
      <?php endif; ?>
    </div>
  </section>

  <?php include '../includes/footer.php'; ?>
</body>

</html>