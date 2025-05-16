<?php
session_start();
include '../config/config.php'; // Oracle connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customers WHERE email = :email";
  $stid = oci_parse($conn, $sql);
  oci_bind_by_name($stid, ":email", $email);
  oci_execute($stid);

  $row = oci_fetch_assoc($stid);

  if ($row && password_verify($password, $row['PASSWORD'])) {
    // Set session variables for user id and name
    $_SESSION['user_id'] = $row['ID'];
    $_SESSION['user_name'] = $row['NAME'];

    // Redirect to profile or dashboard immediately, no output before header
    header("Location: customer-profile.php");
    exit;
  } else {
    // Invalid login - show error below form, no header redirect
    $error = "Invalid email or password.";
  }

  oci_free_statement($stid);
  oci_close($conn);
}

include '../includes/header.php'; // Include after redirect logic
?>

<section class="section">
  <div class="box has-background-light" style="max-width: 400px; margin: 0 auto;">
    <h2 class="title has-text-centered">Customer Login</h2>

    <?php if (!empty($error)) : ?>
      <p style="color:red; text-align:center;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" placeholder="test@gmail.com" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" type="password" name="password" placeholder="********" required>
        </div>
        <p class="help"><a href="forgot-password-customer.php">Forgot Password?</a></p>
      </div>
      <div class="field">
        <div class="control has-text-centered">
          <button class="button is-primary" type="submit">Login</button>
        </div>
      </div>
      <p class="has-text-centered">I don't have an account? <a href="signup.php">Sign up</a></p>
    </form>
  </div>
</section>

<script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>