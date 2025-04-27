<!-- Customers Page -->
<?php
$page_title = "Customers - Mingle Mart";
include 'header.php';
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
            <a class="button is-dark" href="#">Logout</a>
          </div>
        </div>
      </div>
    </nav>

    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="is-active"><a href="#" aria-current="page">Customers</a></li>
      </ul>
    </nav>

    <div class="columns">
      <!-- Sidebar -->
      <div class="column is-3">
        <aside class="menu">
          <p class="menu-label">Customer Dashboard</p>
          <ul class="menu-list">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a class="is-active has-background-grey-light" href="customers.php">Customer Page</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="column is-9">
        <div class="box">
          <h1 class="title">Customers</h1>
          <div class="field is-grouped">
            <div class="control is-expanded">
              <input class="input" type="text" placeholder="Search">
            </div>
            <div class="control">
              <div class="select">
                <select>
                  <option>Status</option>
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
              </div>
            </div>
            <div class="control">
              <a class="button is-light" href="#">Add New Customer</a>
            </div>
          </div>

          <table class="table is-fullwidth is-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Assigned Traders</th>
                <th>Last Login</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="buttons">
                    <a class="button is-small is-light" href="#">View</a>
                    <a class="button is-small is-light" href="#">Edit</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="buttons">
                    <a class="button is-small is-light" href="#">View</a>
                    <a class="button is-small is-light" href="#">Edit</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="buttons">
                    <a class="button is-small is-light" href="#">View</a>
                    <a class="button is-small is-light" href="#">Edit</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="buttons">
                    <a class="button is-small is-light" href="#">View</a>
                    <a class="button is-small is-light" href="#">Edit</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div class="field is-grouped is-grouped-right">
            <p class="control">
              <a class="button is-light" href="#">Export</a>
            </p>
            <p class="control">
            <nav class="pagination" role="navigation" aria-label="pagination">
              <a class="pagination-previous">Previous</a>
              <a class="pagination-next">Next</a>
              <ul class="pagination-list">
                <li><a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a></li>
              </ul>
            </nav>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>