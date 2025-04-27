<!-- Dashboard Page -->
<?php
include '../includes/header.php';
?>

<section class="section">
  <div class="container">
    <!-- Header Section from Wireframe -->
    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="dashboard.php">
          <strong>Mingle Mart</strong>
        </a>
      </div>
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field has-addons">
            <p class="control">
              <input class="input" type="text" placeholder="Search or type a command">
            </p>
            <p class="control">
              <a class="button">
                <span class="icon">
                  <i class="fas fa-search"></i>
                </span>
              </a>
            </p>
          </div>
        </div>
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-light">
              <span class="icon">
                <i class="fas fa-plus"></i>
              </span>
              <span>Create</span>
            </a>
            <a class="button is-light">
              <span class="icon">
                <i class="fas fa-bell"></i>
              </span>
            </a>
            <a class="button is-light">
              <span class="icon">
                <i class="fas fa-pen"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
      </ul>
    </nav>

    <div class="columns">
      <!-- Sidebar -->
      <div class="column is-2">
        <aside class="menu">
          <ul class="menu-list">
            <li><a class="is-active" href="dashboard.php"><span class="icon"><i class="fas fa-home"></i></span> Home</a></li>
            <li><a href="#"><span class="icon"><i class="fas fa-box"></i></span> Products</a></li>
            <li><a href="customers.php"><span class="icon"><i class="fas fa-users"></i></span> Customers</a></li>
            <li><a href="add_trader.php"><span class="icon"><i class="fas fa-user-plus"></i></span> Traders</a></li>
            <li><a href="#"><span class="icon"><i class="fas fa-dollar-sign"></i></span> Income</a></li>
            <li><a href="#"><span class="icon"><i class="fas fa-question-circle"></i></span> Help <span class="tag is-info is-rounded">8</span></a></li>
            <li><a href="#"><span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="column is-10">
        <div class="box">
          <h1 class="title">Dashboard</h1>
          <div class="tabs">
            <ul>
              <li class="is-active"><a>Overview</a></li>
            </ul>
            <div class="field is-pulled-right">
              <div class="control">
                <div class="select">
                  <select>
                    <option>All Time</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="columns">
            <div class="column">
              <div class="box">
                <p class="subtitle">Customers</p>
                <p class="title">10,243</p>
              </div>
            </div>
            <div class="column">
              <div class="box">
                <p class="subtitle">Income</p>
                <p class="title">$39,403,450</p>
              </div>
            </div>
          </div>

          <p class="subtitle">Welcome to our new online experience</p>

          <div class="columns">
            <div class="column is-2">
              <p>Nishan</p>
            </div>
            <div class="column is-2">
              <p>Mohd.</p>
            </div>
            <div class="column is-2">
              <p>Prabesh.</p>
            </div>
            <div class="column is-2">
              <p>Sadikshya.</p>
            </div>
            <div class="column is-2">
              <p>Aditya</p>
            </div>
            <div class="column is-2">
              <p>Adweta</p>
            </div>
          </div>

          <div class="columns">
            <div class="column is-8">
              <!-- Placeholder for content -->
            </div>
            <div class="column is-4">
              <div class="box">
                <p class="subtitle">Popular Products</p>
                <table class="table is-fullwidth">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Earnings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Product A</td>
                      <td>$5461</td>
                    </tr>
                    <tr>
                      <td>Product B</td>
                      <td>$5461</td>
                    </tr>
                    <tr>
                      <td>Product C</td>
                      <td>$5461</td>
                    </tr>
                    <tr>
                      <td>Bananas</td>
                      <td>$5461</td>
                    </tr>
                  </tbody>
                </table>
                <a class="button is-light is-fullwidth" href="#">All Products</a>
              </div>
            </div>
          </div>

          <h2 class="title has-text-centered">Total Income</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>