<?php
session_start();
$showBoxOnly = false;

include '../config/config.php';

$step = 'request';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['step'] === 'request') {
    $email = $_POST['email'];

    $sql = "SELECT trader_id FROM traders WHERE email = :email";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ":email", $email);
    oci_execute($stid);

    if ($row = oci_fetch_assoc($stid)) {
      $token = bin2hex(random_bytes(16));
      $expiry = date('Y-m-d H:i:s', time() + 3600);

      $_SESSION['reset_email'] = $email;
      $_SESSION['reset_token'] = $token;
      $_SESSION['reset_expiry'] = $expiry;

      $reset_link = $_SERVER['PHP_SELF'] . "?token=$token";
      $step = ''; // hide forms
      $showBoxOnly = true;

      // Show reset link in centered box
      echo "<!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <title>Reset Link</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css'>
      </head>
      <body>
        <section class='section is-flex is-justify-content-center is-align-items-center' style='min-height: 100vh;'>
          <div class='box has-background-light has-text-centered'>
            <p class='has-text-success'>
              Reset link generated:<br><br> 
              <a class='button is-link' href='$reset_link'>Click here to reset your password</a>
            </p>
          </div>
        </section>
      </body>
      </html>";
      exit;
    } else {
      $error = "Email not found.";
    }
    oci_free_statement($stid);
  }

  if ($_POST['step'] === 'reset') {
    $token = $_POST['token'];
    $new_pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($token !== ($_SESSION['reset_token'] ?? '') || time() > strtotime($_SESSION['reset_expiry'])) {
      $error = "Invalid or expired token.";
    } elseif ($new_pass !== $confirm) {
      $error = "Passwords do not match.";
    } else {
      $hashed = password_hash($new_pass, PASSWORD_BCRYPT);
      $email = $_SESSION['reset_email'];

      $update = "UPDATE traders SET password = :password WHERE email = :email";
      $ustmt = oci_parse($conn, $update);
      oci_bind_by_name($ustmt, ":password", $hashed);
      oci_bind_by_name($ustmt, ":email", $email);
      oci_execute($ustmt);
      oci_free_statement($ustmt);

      unset($_SESSION['reset_email'], $_SESSION['reset_token'], $_SESSION['reset_expiry']);

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
              <a class='button is-success' href='login-trader.php'>Login now</a>
            </p>
          </div>
        </section>
      </body>
      </html>";
      exit;
    }
  }
}

if (isset($_GET['token']) && $_GET['token'] === ($_SESSION['reset_token'] ?? '')) {
  $step = 'reset';
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
            <button class="button is-primary">Send Reset Link</button>
          </div>
        </form>

      <?php elseif ($step === 'reset'): ?>
        <h2 class="title is-4 has-text-centered">Reset Your Password</h2>
        <form method="POST">
          <input type="hidden" name="step" value="reset">
          <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']); ?>">
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