<?php
session_start();
include '../includes/header.php';
include '../config/config.php';

$error_modal = false;
$success_modal = false;
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
      $success_modal = true;
      $success_message = "Registration verified and successful! <a href='login.php'>Login</a>";
    } else {
      $e = oci_error($stmt);
      $error_modal = true;
      $success_message = "DB Error: " . $e['message'];
    }

    unset($_SESSION['otp'], $_SESSION['temp_user']);
    oci_free_statement($stmt);
    oci_close($conn);
  } else {
    $error_modal = true;
  }
}
?>

<!-- OTP Form Modal (always shown unless success) -->
<?php if (!$success_modal): ?>
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

<!-- Error Modal -->
<?php if ($error_modal): ?>
  <div class="modal is-active" id="errorModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head has-background-danger-light">
        <p class="modal-card-title">Invalid OTP</p>
        <button class="delete" aria-label="close" onclick="closeErrorModal()"></button>
      </header>
      <section class="modal-card-body">
        <p class="has-text-danger"><?= $success_message ?></p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-danger" onclick="closeErrorModal()">Close</button>
      </footer>
    </div>
  </div>
<?php endif; ?>

<!-- Success Modal -->
<?php if ($success_modal): ?>
  <div class="modal is-active" id="successModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head has-background-success-light">
        <p class="modal-card-title">Success</p>
        <button class="delete" aria-label="close" onclick="closeSuccessModal()"></button>
      </header>
      <section class="modal-card-body">
        <p class="has-text-success"><?= $success_message ?></p>
      </section>
      <footer class="modal-card-foot">
        <a class="button is-success" href="login.php">Go to Login</a>
      </footer>
    </div>
  </div>
<?php endif; ?>

<script>
  function closeErrorModal() {
    document.getElementById('errorModal').classList.remove('is-active');
  }

  function closeSuccessModal() {
    document.getElementById('successModal').classList.remove('is-active');
  }
</script>

<?php include '../includes/footer.php'; ?>