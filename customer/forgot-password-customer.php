<?php
session_start();
$showBoxOnly = false;

include '../config/config.php';

$step = 'request';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Step 1: Email request
  if ($_POST['step'] === 'request') {
    $email = $_POST['email'];

    $sql = "SELECT id FROM customers WHERE email = :email";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ":email", $email);
    oci_execute($stid);

    if ($row = oci_fetch_assoc($stid)) {
      $code = random_int(100000, 999999); // 6-digit verification code
      $_SESSION['reset_email'] = $email;
      $_SESSION['reset_code'] = $code;
      $_SESSION['reset_expiry'] = time() + 600; // expires in 10 minutes
      $step = 'verify';

      // Send code via email (update with real SMTP if needed)
      mail($email, " MingleMart customer's account Password Reset Code", "Your password reset code is: $code");
    } else {
      $error = "Email not found.";
    }

    oci_free_statement($stid);
  }

  // Step 2: Code verification
  elseif ($_POST['step'] === 'verify') {
    $inputCode = $_POST['code'];

    if (time() > ($_SESSION['reset_expiry'] ?? 0)) {
      $error = "Verification code expired. Please try again.";
      unset($_SESSION['reset_email'], $_SESSION['reset_code'], $_SESSION['reset_expiry']);
      $step = 'request';
    } elseif ($inputCode != ($_SESSION['reset_code'] ?? '')) {
      $error = "Invalid verification code.";
      $step = 'verify';
    } else {
      $step = 'reset';
    }
  }

  // Step 3: Reset password
  elseif ($_POST['step'] === 'reset') {
    $new_pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($new_pass !== $confirm) {
      $error = "Passwords do not match.";
      $step = 'reset';
    } else {
      $hashed = password_hash($new_pass, PASSWORD_BCRYPT);
      $email = $_SESSION['reset_email'];

      $update = "UPDATE customers SET password = :password WHERE email = :email";
      $ustmt = oci_parse($conn, $update);
      oci_bind_by_name($ustmt, ":password", $hashed);
      oci_bind_by_name($ustmt, ":email", $email);
      oci_execute($ustmt);
      oci_free_statement($ustmt);

      unset($_SESSION['reset_email'], $_SESSION['reset_code'], $_SESSION['reset_expiry']);

      $showBoxOnly = true;

      echo "<!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <title>Password Reset</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css'>
      </head>
      <body>
        <section class='section is-flex is-justify-content-center is-align-items-center' style='min-height: 100vh;'>
          <div class='box has-background-light has-text-centered'>
            <p class='has-text-success'>
              Password updated successfully.<br><br> 
              <a class='button is-success' href='login.php'>Login now</a>
            </p>
          </div>
        </section>
      </body>
      </html>";
      exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <section class="section is-flex is-justify-content-center is-align-items-center" style="min-height: 100vh;">
    <div class="box has-background-light" style="max-width: 450px; width: 100%;">
      <?php if (!empty($error)): ?>
        <p class="has-text-danger has-text-centered"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <?php if ($step === 'request'): ?>
        <h2 class="title is-4 has-text-centered">Forgot Password</h2>
        <form method="POST">
          <input type="hidden" name="step" value="request">
          <div class="field">
            <label class="label">Enter your email</label>
            <div class="control">
              <input class="input" type="email" name="email" required>
            </div>
          </div>
          <div class="field has-text-centered">
            <button class="button is-primary">Send Verification Code</button>
          </div>
        </form>

      <?php elseif ($step === 'verify'): ?>
        <h2 class="title is-4 has-text-centered">Verify Your Email</h2>
        <form method="POST">
          <input type="hidden" name="step" value="verify">
          <div class="field">
            <label class="label">Enter the 6-digit code sent to your email</label>
            <div class="control">
              <input class="input" type="text" name="code" required>
            </div>
          </div>
          <div class="field has-text-centered">
            <button class="button is-link">Verify</button>
          </div>
        </form>

      <?php elseif ($step === 'reset'): ?>
        <h2 class="title is-4 has-text-centered">Reset Your Password</h2>
        <form method="POST">
          <input type="hidden" name="step" value="reset">
          <div class="field">
            <label class="label">New Password</label>
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
            <button class="button is-primary">Reset Password</button>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>
</body>

</html>