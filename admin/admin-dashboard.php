<?php
session_start();
// include '../includes/header.php';
include '../config/config.php';

// Check admin session
if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit;
}


// Handle approve/reject actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $traderId = $_POST['trader_id'];
  $action = $_POST['action'];
  $dateNow = date('Y-m-d');

  if ($action === 'approve') {
    $sql = "UPDATE traders SET status='Approved', approval_date=TO_DATE(:dateNow, 'YYYY-MM-DD') WHERE id=:id";
  } elseif ($action === 'reject') {
    $sql = "UPDATE traders SET status='Rejected', rejection_reason=:reason WHERE id=:id";
  }

  $stid = oci_parse($conn, $sql);
  oci_bind_by_name($stid, ":id", $traderId);

  if ($action === 'approve') {
    oci_bind_by_name($stid, ":dateNow", $dateNow);
  } elseif ($action === 'reject') {
    $reason = $_POST['rejection_reason'];
    oci_bind_by_name($stid, ":reason", $reason);
  }

  $exec = oci_execute($stid);
  oci_free_statement($stid);

  // Send email
  $emailStmt = oci_parse($conn, "SELECT email FROM traders WHERE id = :id");
  oci_bind_by_name($emailStmt, ":id", $traderId);
  oci_execute($emailStmt);
  $emailRow = oci_fetch_assoc($emailStmt);
  $email = $emailRow['EMAIL'];

  $subject = "Trader Registration " . ucfirst($action);
  $message = ($action === 'approve')
    ? "Your trader registration has been approved. You may now login to MingleMart."
    : "Your registration was rejected. Reason: " . htmlspecialchars($reason);

  mail($email, $subject, $message, "From: admin@minglemart.com");

  echo "<script>location.href='admin-dashboard.php';</script>";
}
include '../includes/header.php';
?>

<section class="section">
  <div class="container">
    <h1 class="title">Admin Dashboard - Trader Approvals</h1>

    <table class="table is-fullwidth is-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM traders ORDER BY trader_id DESC";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid);

        while ($row = oci_fetch_assoc($stid)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['TRADER_ID']) . "</td>";
          echo "<td>" . htmlspecialchars($row['NAME']) . "</td>";
          echo "<td>" . htmlspecialchars($row['EMAIL']) . "</td>";
          echo "<td>" . htmlspecialchars($row['STATUS']) . "</td>";
          echo "<td>";

          if ($row['STATUS'] === 'Pending') {
            echo "<form method='POST' style='display:inline;'>
                    <input type='hidden' name='trader_id' value='{$row['TRADER_ID']}'>
                    <button class='button is-small is-success' name='action' value='approve'>Approve</button>
                  </form>
                  <form method='POST' style='display:inline; margin-left:5px;'>
                    <input type='hidden' name='trader_id' value='{$row['TRADER_ID']}'>
                    <input type='hidden' name='rejection_reason' value='Incomplete or invalid information'>
                    <button class='button is-small is-danger' name='action' value='reject'>Reject</button>
                  </form>";
          } else {
            echo "-";
          }

          echo "</td></tr>";
        }

        oci_free_statement($stid);
        oci_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</section>

<?php include '../includes/footer.php'; ?>