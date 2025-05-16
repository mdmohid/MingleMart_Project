<?php
session_start();
include '../includes/header.php';
include '../config/config.php'; // OCI DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM traders WHERE email = :email";
  $stid = oci_parse($conn, $sql);
  oci_bind_by_name($stid, ":email", $email);
  oci_execute($stid);

  $row = oci_fetch_assoc($stid);

  if ($row && password_verify($password, $row['PASSWORD'])) {
    $_SESSION['trader'] = $row['NAME']; // You can store more details if needed
    echo "<p class='has-text-success has-text-centered'>Login successful! Welcome, " . htmlspecialchars($row['NAME']) . ".</p>";
    // You can redirect to a trader dashboard if needed:
    // header("Location: trader-dashboard.php");
    // exit;
  } else {
    echo "<p class='has-text-danger has-text-centered'>Invalid email or password.</p>";
  }

  oci_free_statement($stid);
  oci_close($conn);
}
?>

<section class="section">
  <div class="box has-background-light" style="max-width: 500px; margin: auto;">
    <h2 class="title has-text-centered">Trader Login</h2>
    <form action="login-trader.php" method="POST" id="traderLoginForm">
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
        <p class="help"><a href="forgot-password-trader.php">Forgot password?</a></p>
      </div>
      <div class="field has-text-centered">
        <button class="button is-primary" type="submit">Login</button>
      </div>
      <p class="has-text-centered">Don't have an account? <a href="register-trader.php">Register</a></p>
    </form>
  </div>
</section>

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>