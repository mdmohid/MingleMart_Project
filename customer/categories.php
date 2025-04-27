<?php include '../includes/header.php'; ?>

<section class="section">
  <h1 class="title has-text-centered">Product Categories</h1>
  <div class="columns is-multiline">

    <!-- Butchers -->
    <div class="column is-4">
      <a href="../trader/butchers.php">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="../assets/images/categories/butchers.jpg" alt="Butchers" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">Butchers</p>
          </div>
        </div>
      </a>
    </div>

    <!-- Greengrocer -->
    <div class="column is-4">
      <a href="../trader/greengrocer.php">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="../assets/images/categories/greengrpcers.jpg" alt="Greengrocer" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">Greengrocer</p>
          </div>
        </div>
      </a>
    </div>

    <!-- Delicatessen -->
    <div class="column is-4">
      <a href="../trader/delicatessen.php">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="../assets/images/categories/delicatessen.jpg" alt="Delicatessen" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">Delicatessen</p>
          </div>
        </div>
      </a>
    </div>

    <!-- Fishmonger -->
    <div class="column is-4">
      <a href="../trader/fishmonger.php">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="../assets/images/categories/fishmonger.jpg" alt="Fishmonger" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">Fishmonger</p>
          </div>
        </div>
      </a>
    </div>

    <!-- Bakery -->
    <div class="column is-4">
      <a href="../trader/bakery.php">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="../assets/images/categories/bakery.jpg" alt="Bakery" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">Bakery</p>
          </div>
        </div>
      </a>
    </div>

    <!-- New Trader -->
    <div class="column is-4">
      <a href="../trader/">
        <div class="card category-card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="https://via.placeholder.com/400x300" alt="New Trader" class="category-img">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4">New Trader</p>
          </div>
        </div>
      </a>
    </div>

  </div>
</section>


<?php include '../includes/footer.php'; ?>

<style>
  /* Card hover effect */
  .category-card:hover .category-img {
    transform: scale(1.1);
    /* Slightly enlarge image */
    transition: transform 0.3s ease;
    /* Smooth transition */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    /* Add shadow on hover */
  }

  /* Ensure images fit properly within the card */
  .category-img {
    object-fit: cover;
    /* Ensures images fit without distortion */
    width: 100%;
    height: 100%;
  }
</style>