<?php include '../includes/header.php'; ?>
<section class="section">
  <div class="box has-background-light" style="max-width: 400px; margin: 0 auto;">
    <h2 class="title has-text-centered">Get In Touch</h2>
    <form action="contact.php" method="POST">
      <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" name="name" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Subject</label>
        <div class="control">
          <input class="input" type="text" name="subject" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Feedback</label>
        <div class="control">
          <textarea class="textarea" name="feedback" required></textarea>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary" type="submit">Send</button>
        </div>
        <div class="control">
          <button class="button is-light" type="reset">Reset</button>
        </div>
      </div>
    </form>
  </div>
</section>
<?php include '../includes/footer.php'; ?>