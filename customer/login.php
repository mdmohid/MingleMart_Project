<?php include '../includes/header.php'; ?>
<section class="section">
  <div class="box has-background-light" style="max-width: 400px; margin: 0 auto;">
    <h2 class="title has-text-centered">Login</h2>
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
        <p class="help"><a href="#">Forgot Password?</a></p>
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
<?php include '../includes/footer.php'; ?>