<?php
session_start();
include '../includes/header.php';
include '../config/config.php';

$error_modal = false;
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $entered_otp = trim($_POST['otp']);
  $stored_otp = isset($_SESSION['otp']) ? (string)$_SESSION['otp'] : '';

  if ($entered_otp === $stored_otp) {
    $user = $_SESSION['temp_user'];
    $sql = "INSERT INTO customers (name, email, password) VALUES (:name, :email, :password)";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ":name", $user['name']);
    oci_bind_by_name($stmt, ":email", $user['email']);
    oci_bind_by_name($stmt, ":password", $user['password']);

    if (oci_execute($stmt)) {
      $success_message = "<p class='has-text-success has-text-centered'>Registration verified and successful! <a href='login.php'>Login</a></p>";
    } else {
      $e = oci_error($stmt);
      $success_message = "<p style='color:red;'>DB Error: " . $e['message'] . "</p>";
    }

    unset($_SESSION['otp'], $_SESSION['temp_user']);
    oci_free_statement($stmt);
    oci_close($conn);
  } else {
    $error_modal = true;
  }
}
?>

<?= $success_message ?>

<!-- OTP Form Modal (Always shown unless success) -->
<?php if (!$success_message): ?>
  <div class="modal is-active" id="otpModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Verify OTP</p>
        <button class="delete" aria-label="close" onclick="window.location.href='signup.php'"></button>
      </header>
      <section class="modal-card-body">
        <form method="POST">
          <div class="field">
            <label class="label">Enter OTP</label>
            <div class="control">
              <input class="input" type="text" name="otp" placeholder="6-digit OTP" required>
            </div>
          </div>
          <div class="field has-text-centered">
            <button class="button is-primary" type="submit">Verify</button>
          </div>
        </form>
      </section>
    </div>
  </div>
<?php endif; ?>

<!-- Error Modal (only if incorrect OTP) -->
<?php if ($error_modal): ?>
  <div class="modal is-active" id="errorModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head has-background-danger-light">
        <p class="modal-card-title">Invalid OTP</p>
        <button class="delete" aria-label="close" onclick="closeErrorModal()"></button>
      </header>
      <section class="modal-card-body">
        <p class="has-text-danger">Incorrect OTP. Please try again.</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-danger" onclick="closeErrorModal()">Close</button>
      </footer>
    </div>
  </div>
<?php endif; ?>

<script>
  function closeErrorModal() {
    document.getElementById('errorModal').classList.remove('is-active');
  }
</script>

<?php include '../includes/footer.php'; ?>