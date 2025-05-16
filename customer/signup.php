<?php session_start(); // Start the session
include '../includes/header.php'; ?>
<?php
include '../config/config.php'; // Include the OCI DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $confirm  = $_POST['confirm_password'];

  // Simple password match check
  if ($password !== $confirm) {
    echo "<p style='color:red;'>Passwords do not match!</p>";
    exit;
  }

  // Optional: Hash password
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

  // Prepare SQL insert statement
  $sql = "INSERT INTO customers (name, email, password) VALUES (:name, :email, :password)";
  $stid = oci_parse($conn, $sql);

  // Bind parameters
  oci_bind_by_name($stid, ":name", $name);
  oci_bind_by_name($stid, ":email", $email);
  oci_bind_by_name($stid, ":password", $hashed_password);

  // Execute and check result
  $result = oci_execute($stid);

  if ($result) {
    echo "<p class='has-text-success has-text-centered'>Registration successful! <a href='login.php'>Login</a></p>";
  } else {
    $e = oci_error($stid);
    echo "<p style='color:red;'>Error: " . $e['message'] . "</p>";
  }

  // Free resources
  oci_free_statement($stid);
  oci_close($conn);
}
?>

<section class="section">
  <div class="box has-background-light" style="max-width: 400px; margin: 0 auto;">
    <h2 class="title has-text-centered">Customer Registration</h2>
    <form action="signup.php" method="POST">
      <div class="field">
        <label class="label">Customer's Name</label>
        <div class="control">
          <input class="input" type="text" name="name" placeholder="Your Name" required>
        </div>
      </div>
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
      </div>
      <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
          <input class="input" type="password" name="confirm_password" placeholder="********" required>
        </div>
      </div>
      <div class="field">
        <div class="control has-text-centered">
          <button class="button is-primary" type="submit">Register</button>
        </div>
      </div>
      <p class="has-text-centered">I already have an account? <a href="login.php">Log In</a></p>
    </form>
  </div>
</section>

<script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>