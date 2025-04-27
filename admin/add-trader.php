<!-- Add Trader Page -->
<?php
include '../includes/header.php';
?>

<section class="section">
  <div class="container">
    <!-- Header Section from Wireframe -->
    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="dashboard.php">
          <strong>LOGO</strong>
        </a>
      </div>
      <div class="navbar-end">
        <div class="navbar-item">
          <p class="is-size-6">NISHAN ROKKA</p>
        </div>
        <div class="navbar-item">
          <figure class="image is-32x32">
            <img class="is-rounded" src="https://bulma.io/images/placeholders/32x32.png">
          </figure>
        </div>
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-dark" href="#">Log Out</a>
          </div>
        </div>
      </div>
    </nav>

    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="is-active"><a href="#" aria-current="page">Add Trader</a></li>
      </ul>
    </nav>

    <div class="columns">
      <!-- Sidebar -->
      <div class="column is-3">
        <aside class="menu">
          <p class="menu-label">Customer Dashboard</p>
          <ul class="menu-list">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">My Projects</a></li>
            <li><a href="#">Inquiries</a></li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Ratings and Reviews</a></li>
            <li><a href="#">Troubleshoot</a></li>
            <li><a class="is-active has-background-grey-light" href="add_trader.php">Add Trader</a></li>
            <li><a href="#">Settings</a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="column is-9">
        <div class="box has-text-centered">
          <h1 class="title">Become our Trader</h1>
        </div>
        <div class="box">
          <form action="process_trader.php" method="POST">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label class="label">First Name</label>
                  <div class="control">
                    <input class="input" type="text" name="first_name" placeholder="First Name" required>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="field">
                  <label class="label">Last Name</label>
                  <div class="control">
                    <input class="input" type="text" name="last_name" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Username</label>
              <div class="control">
                <input class="input" type="text" name="username" placeholder="Username" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Email Address" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Password</label>
              <div class="control">
                <input class="input" type="password" name="password" placeholder="Password" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Contact</label>
              <div class="control">
                <input class="input" type="tel" name="contact" placeholder="Contact" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Address</label>
              <div class="control">
                <input class="input" type="text" name="address" placeholder="Address" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Shop Name</label>
              <div class="control">
                <input class="input" type="text" name="shop_name" placeholder="Shop Name" required>
              </div>
            </div>

            <div class="field">
              <label class="label">Shop Type</label>
              <div class="control">
                <input class="input" type="text" name="shop_type" placeholder="Shop Type" required>
              </div>
            </div>

            <div class="field">
              <label class="checkbox">
                <input type="checkbox" name="terms" required>
                Agree Terms and Conditions
              </label>
            </div>

            <div class="field">
              <div class="control">
                <button class="button is-dark is-fullwidth" type="submit">Register</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>