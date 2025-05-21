<?php
session_start();
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Hardcoded admin credentials (or fetch from DB)
  if ($username === 'admin' && $password === 'admin123') {
    $_SESSION['admin'] = $username;
    header("Location: admin-dashboard.php");
    exit;
  } else {
    $error = "Invalid credentials!";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container" style="max-width: 400px;">
      <h1 class="title has-text-centered">Admin Login</h1>
      <?php if (isset($error)) echo "<p class='has-text-danger has-text-centered'>$error</p>"; ?>
      <form method="POST">
        <div class="field">
          <label class="label">Username</label>
          <div class="control">
            <input class="input" type="text" name="username" required>
          </div>
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input class="input" type="password" name="password" required>
          </div>
        </div>
        <div class="field has-text-centered">
          <button class="button is-link" type="submit">Login</button>
        </div>
      </form>
    </div>
  </section>
</body>

</html>


<!-- <a href="https://your-apex-url/apex/f?p=APP_ID:LOGIN:SESSION" class="button is-link">Admin Dashboard</a> -->