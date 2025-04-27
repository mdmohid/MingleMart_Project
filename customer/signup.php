<?php include 'includes/header.php'; ?>
    <section class="section">
        <div class="box has-background-light" style="max-width: 400px; margin: 0 auto;">
            <h2 class="title has-text-centered">Sign Up</h2>
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
                        <button class="button is-primary" type="submit">Sign Up</button>
                    </div>
                </div>
                <p class="has-text-centered">I already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>