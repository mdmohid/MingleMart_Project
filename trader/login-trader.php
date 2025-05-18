<?php
session_start();
// include '../includes/header.php';
include '../config/config.php'; // OCI DB connection

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   $sql = "SELECT * FROM traders WHERE email = :email";
//   $stid = oci_parse($conn, $sql);
//   oci_bind_by_name($stid, ":email", $email);
//   oci_execute($stid);

//   $row = oci_fetch_assoc($stid);

//   if ($row && password_verify($password, $row['PASSWORD'])) {
//     $_SESSION['trader'] = $row['NAME']; // You can store more details if needed
//     echo "<p class='has-text-success has-text-centered'>Login successful! Welcome, " . htmlspecialchars($row['NAME']) . ".</p>";
//     // You can redirect to a trader dashboard if needed:
//     // header("Location: trader-dashboard.php");
//     // exit;
//   } else {
//     echo "<p class='has-text-danger has-text-centered'>Invalid email or password.</p>";
//   }

//   oci_free_statement($stid);
//   oci_close($conn);
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM traders WHERE email = :email";
  $stid = oci_parse($conn, $sql);
  oci_bind_by_name($stid, ":email", $email);
  oci_execute($stid);

  $row = oci_fetch_assoc($stid);

  // if ($row && password_verify($password, $row['PASSWORD'])) {
  //   if ($row['STATUS'] === 'Approved') {
  //     $_SESSION['trader'] = $row['NAME']; // Or store trader ID, email, etc.
  //     echo "<p class='has-text-success has-text-centered'>Login successful! Welcome, " . htmlspecialchars($row['NAME']) . ".</p>";
  //     // Optionally redirect:
  //     // header("Location: trader-dashboard.php");
  //     // exit;
  //   } elseif ($row['STATUS'] === 'Pending') {
  //     echo "<p class='has-text-warning has-text-centered'>Your account is still pending admin approval. Please wait.</p>";
  //   } elseif ($row['STATUS'] === 'Rejected') {
  //     echo "<p class='has-text-danger has-text-centered'>Your registration was rejected. Please contact support.</p>";
  //   } else {
  //     echo "<p class='has-text-danger has-text-centered'>Your account status is not valid.</p>";
  //   }
  // } else {
  //   echo "<p class='has-text-danger has-text-centered'>Invalid email or password.</p>";
  // }

  // if ($row && password_verify($password, $row['PASSWORD'])) {
  //   if ($row['STATUS'] === 'Approved') {
  //     $_SESSION['trader'] = $row['NAME'];
  //     echo "
  //     <div class='modal is-active'>
  //       <div class='modal-background'></div>
  //       <div class='modal-card'>
  //         <header class='modal-card-head has-background-success'>
  //           <p class='modal-card-title has-text-white'>Login Successful</p>
  //           <button class='delete' aria-label='close'></button>
  //         </header>
  //         <section class='modal-card-body'>
  //           Welcome, " . htmlspecialchars($row['NAME']) . "!
  //         </section>
  //       </div>
  //     </div>
  //   ";
  //   } elseif ($row['STATUS'] === 'Pending') {
  //     echo "
  //     <div class='modal is-active'>
  //       <div class='modal-background'></div>
  //       <div class='modal-card'>
  //         <header class='modal-card-head has-background-warning'>
  //           <p class='modal-card-title has-text-black'>Pending Approval</p>
  //           <button class='delete' aria-label='close'></button>
  //         </header>
  //         <section class='modal-card-body'>
  //           Your account is still pending admin approval. Please wait.
  //         </section>
  //       </div>
  //     </div>
  //   ";
  //   } elseif ($row['STATUS'] === 'Rejected') {
  //     echo "
  //     <div class='modal is-active'>
  //       <div class='modal-background'></div>
  //       <div class='modal-card'>
  //         <header class='modal-card-head has-background-danger'>
  //           <p class='modal-card-title has-text-white'>Registration Rejected</p>
  //           <button class='delete' aria-label='close'></button>
  //         </header>
  //         <section class='modal-card-body'>
  //           Your registration was rejected. Please contact support.
  //         </section>
  //       </div>
  //     </div>
  //   ";
  //   } else {
  //     echo "
  //     <div class='modal is-active'>
  //       <div class='modal-background'></div>
  //       <div class='modal-card'>
  //         <header class='modal-card-head has-background-grey'>
  //           <p class='modal-card-title has-text-white'>Unknown Status</p>
  //           <button class='delete' aria-label='close'></button>
  //         </header>
  //         <section class='modal-card-body'>
  //           Your account status is not valid.
  //         </section>
  //       </div>
  //     </div>
  //   ";
  //   }
  // } else {
  //   echo "
  //   <div class='modal is-active'>
  //     <div class='modal-background'></div>
  //     <div class='modal-card'>
  //       <header class='modal-card-head has-background-danger'>
  //         <p class='modal-card-title has-text-white'>Login Failed</p>
  //         <button class='delete' aria-label='close'></button>
  //       </header>
  //       <section class='modal-card-body'>
  //         Invalid email or password.
  //       </section>
  //     </div>
  //   </div>
  // ";
  // }


  if ($row && password_verify($password, $row['PASSWORD'])) {
    if ($row['STATUS'] === 'Approved') {
      $_SESSION['trader'] = $row['NAME']; // Save necessary session info
      $_SESSION['trader_id'] = $row['TRADER_ID']; // Optional if you need ID later

      // Redirect to trader profile/dashboard
      header("Location: trader-profile.php");
      exit;
    } elseif ($row['STATUS'] === 'Pending') {
      // Pending modal
      echo "
    <div class='modal is-active'>
      <div class='modal-background'></div>
      <div class='modal-card'>
        <header class='modal-card-head has-background-warning'>
          <p class='modal-card-title has-text-black'>Pending Approval</p>
          <button class='delete' aria-label='close'></button>
        </header>
        <section class='modal-card-body'>
          Your account is still pending admin approval. Please wait.
        </section>
      </div>
    </div>
    ";
    } elseif ($row['STATUS'] === 'Rejected') {
      // Rejected modal
      echo "
    <div class='modal is-active'>
      <div class='modal-background'></div>
      <div class='modal-card'>
        <header class='modal-card-head has-background-danger'>
          <p class='modal-card-title has-text-white'>Registration Rejected</p>
          <button class='delete' aria-label='close'></button>
        </header>
        <section class='modal-card-body'>
          Your registration was rejected. Please contact support.
        </section>
      </div>
    </div>
    ";
    } else {
      // Unknown status modal
      echo "
    <div class='modal is-active'>
      <div class='modal-background'></div>
      <div class='modal-card'>
        <header class='modal-card-head has-background-grey'>
          <p class='modal-card-title has-text-white'>Unknown Status</p>
          <button class='delete' aria-label='close'></button>
        </header>
        <section class='modal-card-body'>
          Your account status is not valid.
        </section>
      </div>
    </div>
    ";
    }
  } else {
    // Login failed modal
    echo "
  <div class='modal is-active'>
    <div class='modal-background'></div>
    <div class='modal-card'>
      <header class='modal-card-head has-background-danger'>
        <p class='modal-card-title has-text-white'>Login Failed</p>
        <button class='delete' aria-label='close'></button>
      </header>
      <section class='modal-card-body'>
        Invalid email or password.
      </section>
    </div>
  </div>
  ";
  }





  oci_free_statement($stid);
  oci_close($conn);
}
include '../includes/header.php';

?>

<section class="section">
  <div class="box has-background-light" style="max-width: 500px; margin: auto;">
    <h2 class="title has-text-centered">Trader Login</h2>
    <form action="login-trader.php" method="POST" id="traderLoginForm">
      <div class="field">
        <label class="label">Email</label>
        <div class="control">
          <input class="input" type="email" name="email" placeholder="email@example.com" required>
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <div class="control">
          <input class="input" type="password" name="password" placeholder="********" required>
        </div>
        <p class="help"><a href="forgot-password-trader.php">Forgot password?</a></p>
      </div>
      <div class="field has-text-centered">
        <button class="button is-primary" type="submit">Login</button>
      </div>
      <p class="has-text-centered">Don't have an account? <a href="register-trader.php">Register</a></p>
    </form>
  </div>
</section>

<!-- for modal message -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.modal .delete');
    deleteButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        btn.closest('.modal').classList.remove('is-active');
      });
    });
  });
</script>



<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>