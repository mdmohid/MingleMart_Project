<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MingleMart</title>

  <!-- Include Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

  <!-- Optional: FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Optional: Local custom CSS -->
  <!-- <link rel="stylesheet" href="/MingleMart_Project/css/style.css"> -->

  <style>
    .navbar {
      position: sticky !important;
      top: 0;
      z-index: 1000;
      background-color: #fff;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar-start .navbar-item:hover {
      color: #3273dc !important;
      background-color: rgb(225, 225, 225) !important;
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <nav class="navbar is-white" role="navigation" aria-label="main navigation">
    <div class="navbar-brand is-flex is-justify-content-space-between is-align-items-center">
      <a class="navbar-item" href="/MingleMart_Project/index.php">
        <img src="/MingleMart_Project/assets/images/customer/logo.png" alt="logo" style="max-height: 80px" />
      </a>

      <!-- Mobile menu toggle -->
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarMain">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarMain" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="/MingleMart_Project/index.php">Home</a>
        <a class="navbar-item" href="/MingleMart_Project/customer/about.php">About Us</a>
        <a class="navbar-item" href="/MingleMart_Project/customer/categories.php">Categories</a>
        <a class="navbar-item" href="/MingleMart_Project/trader/register-trader.php">Become a trader</a>
        <a class="navbar-item" href="/MingleMart_Project/customer/contact.php">Contact Us</a>
      </div>

      <div class="navbar-end">
        <!-- Search -->
        <div class="navbar-item">
          <div class="field has-addons">
            <div class="control">
              <input class="input is-small" type="text" placeholder="Search">
            </div>
            <div class="control">
              <a class="button is-small is-light">
                <span class="icon">
                  <i class="fas fa-search"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Cart -->
        <div class="navbar-item">
          <a class="icon-text" href="/MingleMart_Project/customer/cart.php">
            <span class="icon">
              <i class="fas fa-shopping-bag"></i>
            </span>
            <span>0</span>
          </a>
        </div>

        <!-- Login/Register -->
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-light" href="/MingleMart_Project/customer/login.php">Login</a>
            <a class="button is-primary" href="/MingleMart_Project/customer/signup.php">
              <strong>Register</strong>
            </a>
          </div>
        </div>

        <!-- User Icon
        <div class="navbar-item">
          <a class="icon-text" href="/MingleMart_Project/customer/customer-profile.php">
            <span class="icon">
              <i class="fas fa-user"></i>
            </span>
          </a>
        </div> -->




        <!-- User Icon Dropdown -->
        <div class="navbar-item " id="userDropdown">
          <a class="navbar-link" id="userDropdownToggle">
            <span class="icon">
              <i class="fas fa-user"></i>
            </span>
          </a>

          <div class="navbar-dropdown is-right">
            <?php if (isset($_SESSION['user'])): ?>
              <!-- Customer Logged In -->
              <a href="/MingleMart_Project/customer/customer-profile.php" class="navbar-item">
                Customer Profile
              </a>
              <a href="../config/logout.php" class="navbar-item">
                Logout
              </a>

            <?php elseif (isset($_SESSION['trader'])): ?>
              <!-- Trader Logged In -->
              <a href="/MingleMart_Project/trader/trader-profile.php" class="navbar-item">
                Trader Profile
              </a>
              <a href="../config/logout.php" class="navbar-item">
                Logout
              </a>

            <?php else: ?>
              <!-- Not Logged In -->
              <a href="/MingleMart_Project/customer/login.php" class="navbar-item">
                Login as Customer
              </a>
              <a href="/MingleMart_Project/trader/login-trader.php" class="navbar-item">
                Login as Trader
              </a>
            <?php endif; ?>
          </div>
        </div>





      </div>
    </div>
  </nav>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dropdown = document.getElementById('userDropdown');
      const toggle = document.getElementById('userDropdownToggle');

      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        dropdown.classList.toggle('is-active');
      });

      // Optional: Close dropdown if clicked outside
      document.addEventListener('click', function(e) {
        if (!dropdown.contains(e.target)) {
          dropdown.classList.remove('is-active');
        }
      });
    });
  </script>



  <!-- Enable the burger toggle for mobile -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const $burger = document.querySelector('.navbar-burger');
      const $menu = document.getElementById('navbarMain');

      $burger.addEventListener('click', () => {
        $burger.classList.toggle('is-active');
        $menu.classList.toggle('is-active');
      });
    });
  </script>
</body>

</html>