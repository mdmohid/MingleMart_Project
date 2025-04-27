<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Include Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

  <!-- Optional: FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- 
  <link rel="stylesheet" href="../css/style.css"> -->

  <style>
    .navbar {
      position: sticky !important;
      top: 0;
      z-index: 1000;
      /* Ensures that the navbar stays on top of other content */
      background-color: #fff;
      /* Ensures the navbar has a white background */
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
      /* Adds a subtle shadow for better visibility */
    }

    /* .navbar-start .navbar-item {
    transition: background-color 0.3s ease, color 0.3s ease;
  } */

    .navbar-start .navbar-item:hover {
      color: rgb(11, 10, 10) !important;
      /* Change text color */
      background-color: rgb(242, 215, 161) !important;
      /* Bulma primary blue */
      border-radius: 5px;
      /* Optional: smooth corners */
    }
  </style>

</head>

<body>

  <nav class="navbar is-white" role="navigation" aria-label="main navigation">
    <div class="navbar-brand is-flex is-justify-content-space-between  is-align-items-center">
      <!-- <a class="navbar-item has-text-weight-bold" href="#">
      LOGO
    </a> -->
      <a class="navbar-item" href="index.php">
        <img src="../assets/images/customer/logo.png" alt="logo" style="max-height: 80px" />
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
        <a class="navbar-item" href="/index.php">Home</a>
        <a class="navbar-item" href="../customer/about.php">About Us</a>
        <a class="navbar-item" href="../customer/categories.php">Categories</a>
        <a class="navbar-item" href="../customer/signup.php">Become a trader</a>
        <a class="navbar-item" href="../customer/contact.php">Contact Us</a>
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
          <a class="icon-text" href="../customer/cart.php">
            <span class="icon">
              <i class="fas fa-shopping-bag"></i>
            </span>
            <span>0</span>
          </a>
        </div>

        <!-- Login/Register -->
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-light" href="../customer/login.php">Login</a>
            <a class="button is-primary" href="../customer/signup.php">
              <strong>Register</strong>
            </a>
          </div>
        </div>

        <!-- User Icon -->
        <div class="navbar-item">
          <a class="icon-text" href="cart.php">
            <span class="icon">
              <i class="fas fa-user"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </nav>



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