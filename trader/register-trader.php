<?php
session_start();
include '../includes/header.php';
include '../config/config.php'; // OCI connection

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $name     = $_POST['name'];
//   $email    = $_POST['email'];
//   $password = $_POST['password'];
//   $confirm  = $_POST['confirm_password'];

//   if ($password !== $confirm) {
//     echo "<p class='has-text-danger has-text-centered'>Passwords do not match!</p>";
//   } else {
//     $hashed_password = password_hash($password, PASSWORD_BCRYPT);

//     // Trader inserted with status 'Pending'
//     $sql = "INSERT INTO traders (name, email, password, status) 
//             VALUES (:name, :email, :password, 'Pending')";
//     $stid = oci_parse($conn, $sql);
//     oci_bind_by_name($stid, ":name", $name);
//     oci_bind_by_name($stid, ":email", $email);
//     oci_bind_by_name($stid, ":password", $hashed_password);

//     $result = oci_execute($stid);

//     if ($result) {
//       echo "<p class='has-text-success has-text-centered'>Registration submitted! Wait for admin approval</p>";
//     } else {
//       $e = oci_error($stid);
//       echo "<p class='has-text-danger has-text-centered'>Error: " . htmlspecialchars($e['message']) . "</p>";
//     }

//     oci_free_statement($stid);
//     oci_close($conn);
//   }
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $confirm  = $_POST['confirm_password'];

  if ($password !== $confirm) {
    echo "<p class='has-text-danger has-text-centered'>Passwords do not match!</p>";
  } else {
    // Check if email already exists
    $check_sql = "SELECT COUNT(*) AS EMAIL_COUNT FROM traders WHERE email = :email";
    $check_stid = oci_parse($conn, $check_sql);
    oci_bind_by_name($check_stid, ":email", $email);
    oci_execute($check_stid);
    $check_row = oci_fetch_assoc($check_stid);

    if ($check_row['EMAIL_COUNT'] > 0) {
      echo "<p class='has-text-danger has-text-centered'>Email already registered. Please use a different email.</p>";
    } else {
      $hashed_password = password_hash($password, PASSWORD_BCRYPT);

      // Insert trader with status = 'Pending'
      $sql = "INSERT INTO traders (name, email, password, status) 
              VALUES (:name, :email, :password, 'Pending')";
      $stid = oci_parse($conn, $sql);
      oci_bind_by_name($stid, ":name", $name);
      oci_bind_by_name($stid, ":email", $email);
      oci_bind_by_name($stid, ":password", $hashed_password);

      $result = oci_execute($stid);

      if ($result) {
        echo "<p class='has-text-success has-text-centered'>Registration submitted! Wait for admin approval.</p>";
      } else {
        $e = oci_error($stid);
        echo "<p class='has-text-danger has-text-centered'>Error: " . htmlspecialchars($e['message']) . "</p>";
      }

      oci_free_statement($stid);
    }

    oci_free_statement($check_stid);
    oci_close($conn);
  }
}
?>


<section class="section">
  <div class="box has-background-light" style="max-width: 500px; margin: auto;">
    <h2 class="title has-text-centered">Trader Registration</h2>
    <form action="register-trader.php" method="POST">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="name" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" type="password" name="password" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
          <input class="input" type="password" name="confirm_password" required>
        </div>
      </div>
      <div class="field has-text-centered">
        <button class="button is-primary" type="submit">Register</button>
      </div>
      <p class="has-text-centered">Already have an account? <a href="login-trader.php">Login</a></p>
    </form>
  </div>
</section>

<?php include '../includes/footer.php'; ?>