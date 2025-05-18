<?php
session_start();
include '../config/config.php'; // OCI connection

// You should add admin session validation here for security

function sendEmail($to, $subject, $message)
{
  $headers = "From: no-reply@minglemart.com\r\n";
  $headers .= "Content-type: text/html\r\n";
  mail($to, $subject, $message, $headers);
}

if (isset($_POST['action']) && isset($_POST['trader_id'])) {
  $trader_id = (int)$_POST['trader_id'];
  $action = $_POST['action'];

  if ($action === 'approve') {
    $status = 'Approved';
    $approval_date = date('d-M-y H:i:s');
    $sql = "UPDATE traders SET status = :status, approval_date = SYSDATE, rejection_reason = NULL WHERE trader_id = :id";
  } elseif ($action === 'reject') {
    $status = 'Rejected';
    $rejection_reason = trim($_POST['rejection_reason'] ?? 'No reason provided');
    $sql = "UPDATE traders SET status = :status, rejection_reason = :reason, approval_date = NULL WHERE trader_id = :id";
  } else {
    $status = null;
  }

  if ($status) {
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ":status", $status);
    oci_bind_by_name($stid, ":id", $trader_id);
    if ($status === 'Rejected') {
      oci_bind_by_name($stid, ":reason", $rejection_reason);
    }
    oci_execute($stid);

    // Get trader email
    $sql2 = "SELECT email, name FROM traders WHERE trader_id = :id";
    $stid2 = oci_parse($conn, $sql2);
    oci_bind_by_name($stid2, ":id", $trader_id);
    oci_execute($stid2);
    $row = oci_fetch_assoc($stid2);
    $email = $row['EMAIL'];
    $name = $row['NAME'];

    // Prepare email
    if ($status === 'Approved') {
      $subject = "Trader Registration Approved";
      $message = "Hi $name,<br><br>Your registration has been <b>approved</b> by the admin. You can now log in  <a href='https://MingleMart_Project/trader/login-trader'>Login</a>.<br><br>Thank you!";
    } else {
      $subject = "Trader Registration Rejected";
      $message = "Hi $name,<br><br>Your registration was <b>rejected</b> by the admin.<br>Reason: " . htmlspecialchars($rejection_reason) . "<br><br>Please contact support for more information.";
    }
    sendEmail($email, $subject, $message);

    $message_status = "Trader has been $status.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin - Approve Traders</title>
  <link href="../assets/css/bulma.min.css" rel="stylesheet" />
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class="title">Pending Trader Approvals</h1>
      <?php if (!empty($message_status)): ?>
        <div class="notification is-info"><?= $message_status ?></div>
      <?php endif; ?>

      <table class="table is-fullwidth is-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT trader_id, name, email, registered_at FROM traders WHERE status = 'Pending' ORDER BY registered_at ASC";
          $stid = oci_parse($conn, $sql);
          oci_execute($stid);
          while ($row = oci_fetch_assoc($stid)):
          ?>
            <tr>
              <td><?= htmlspecialchars($row['NAME']) ?></td>
              <td><?= htmlspecialchars($row['EMAIL']) ?></td>
              <td><?= htmlspecialchars($row['REGISTERED_AT']) ?></td>
              <td>
                <form method="POST" style="display:inline-block;">
                  <input type="hidden" name="trader_id" value="<?= $row['TRADER_ID'] ?>" />
                  <input type="hidden" name="action" value="approve" />
                  <button class="button is-small is-success" type="submit">Approve</button>
                </form>

                <form method="POST" style="display:inline-block; margin-left:10px;">
                  <input type="hidden" name="trader_id" value="<?= $row['TRADER_ID'] ?>" />
                  <input type="hidden" name="action" value="reject" />
                  <input type="text" name="rejection_reason" placeholder="Reason" required style="width: 200px;" />
                  <button class="button is-small is-danger" type="submit">Reject</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>