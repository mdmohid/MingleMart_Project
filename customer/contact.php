<?php
session_start();
include '../includes/header.php';
include '../config/config.php'; // Ensure this file sets up $conn with oci_connect()

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $feedback = $_POST['feedback'];

  $sql = "INSERT INTO contact_messages (name, email, subject, feedback)
          VALUES (:name, :email, :subject, :feedback)";
  $stid = oci_parse($conn, $sql);

  oci_bind_by_name($stid, ':name', $name);
  oci_bind_by_name($stid, ':email', $email);
  oci_bind_by_name($stid, ':subject', $subject);
  oci_bind_by_name($stid, ':feedback', $feedback);

  if (oci_execute($stid)) {
    echo "<p class='has-text-success has-text-centered'>Thank you! Your message has been received.</p>";
  } else {
    $e = oci_error($stid);
    echo "<p class='has-text-danger has-text-centered'>Error: " . htmlentities($e['message']) . "</p>";
  }

  oci_free_statement($stid);
  oci_close($conn);
}
?>

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

<script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>