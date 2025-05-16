<?php
session_start();
include '../includes/header.php';
include '../config/config.php'; // OCI connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $confirm  = $_POST['confirm_password'];

  if ($password !== $confirm) {
    echo "<p class='has-text-danger has-text-centered'>Passwords do not match!</p>";
  } else {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO traders (name, email, password) VALUES (:name, :email, :password)";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ":name", $name);
    oci_bind_by_name($stid, ":email", $email);
    oci_bind_by_name($stid, ":password", $hashed_password);

    $result = oci_execute($stid);

    if ($result) {
      echo "<p class='has-text-success has-text-centered'>Registration successful! <a href='login-trader.php'>Login</a></p>";
    } else {
      $e = oci_error($stid);
      echo "<p class='has-text-danger has-text-centered'>Error: " . htmlspecialchars($e['message']) . "</p>";
    }

    oci_free_statement($stid);
    oci_close($conn);
  }
}
?>

<section class="section">
  <div class="box has-background-light" style="max-width: 500px; margin: auto;">
    <h2 class="title has-text-centered">Trader Registration</h2>
    <form action="register-trader.php" method="POST" id="traderForm">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="name" placeholder="Trader Name" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" placeholder="email@example.com" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" type="password" name="password" placeholder="********" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
          <input class="input" type="password" name="confirm_password" placeholder="********" required>
        </div>
      </div>
      <div class="field has-text-centered">
        <button class="button is-primary" type="submit">Register</button>
      </div>
      <p class="has-text-centered">Already have an account? <a href="login-trader.php">Login</a></p>
    </form>
  </div>
</section>

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>