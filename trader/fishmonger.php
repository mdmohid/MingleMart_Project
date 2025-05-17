<?php include '../includes/header.php'; ?>

<section class="section">
  <div class="container">

    <!-- Shop By Category -->
    <h2 class="title is-4">Shop By Category</h2>
    <div class="columns is-multiline mb-5">
      <div class="column is-2 has-text-centered">
        <a href="../trader/bakery.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/bakery.jpg" alt="Bakery" />
          </div>
          <p>Bakery</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/butchers.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/butchers.jpg" alt="Butcher" />
          </div>
          <p>Butcher</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/greengrocer.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/greengrpcers.jpg" alt="Greengrocer" />
          </div>
          <p>Greengrocer</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/delicatessen.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/delicatessen.jpg" alt="Delicatessen" />
          </div>
          <p>Delicatessen</p>
        </a>
      </div>
      <div class="column is-2 has-text-centered">
        <a href="../trader/fishmonger.php" class="category-link">
          <div class="category-image">
            <img src="../assets/images/categories/fishmonger.jpg" alt="Fishmonger" />
          </div>
          <p>Fishmonger</p>
        </a>
      </div>
    </div>

    <!-- Category Images Style -->
    <style>
      .category-image {
        width: 120px;
        height: 120px;
        margin: 0 auto 10px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #ddd;
        transition: all 0.3s ease;
      }

      .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .category-link:hover .category-image {
        transform: scale(1.05);
        border-color: #3273dc;
        box-shadow: 0 4px 12px rgba(50, 115, 220, 0.4);
      }
    </style>

    <div class="columns">
      <!-- Sidebar Filters -->
      <aside class="column is-3">
        <h4 class="title is-5">Filter as you go...</h4>
        <div class="box">
          <p><strong>Search</strong></p>
          <input class="input" type="text" placeholder="Search..." />
        </div>

        <div class="box">
          <p><strong>Categories</strong></p>
          <label class="checkbox"><input type="checkbox" /> Fishmonger</label><br />
          <label class="checkbox"><input type="checkbox" /> Delicatessen</label><br />
          <label class="checkbox"><input type="checkbox" /> Butcher</label><br />
          <label class="checkbox"><input type="checkbox" /> Bakery</label><br />
          <label class="checkbox"><input type="checkbox" /> Greengrocer</label>
        </div>

        <div class="box">
          <p><strong>Price</strong></p>
          <div class="field has-addons">
            <p class="control"><input class="input" type="number" placeholder="Min"></p>
            <p class="control"><input class="input" type="number" placeholder="Max"></p>
          </div>
        </div>


      </aside>

      <!-- Product Grid -->
      <div class="column is-9">
        <h4 class="title is-5">Fishmonger Products</h4>
        <div class="columns is-multiline" id="product-list">


          <!-- Fishmongers Product 1 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish3.jpg" alt="Fresh Salmon">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Ocean Harvest</p>
                <p class="title is-6">Fresh Atlantic Salmon (200g)</p>
                <p class="has-text-weight-bold">$6.99</p>
                <p class="has-text-warning">★★★★★</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Fishmongers Product 2 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish4.jpg" alt="Cod Fillets">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Seaside Market</p>
                <p class="title is-6">Cod Fillets (2 pieces)</p>
                <p class="has-text-weight-bold">$5.50</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Fishmongers Product 3 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish2.jpg" alt="Tuna Steaks">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Bluefin Catch</p>
                <p class="title is-6">Tuna Steaks (2 x 150g)</p>
                <p class="has-text-weight-bold">$8.20</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Fishmongers Product 4 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish1.jpg" alt="Tiger Prawns">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Shell Shack</p>
                <p class="title is-6">Tiger Prawns (300g)</p>
                <p class="has-text-weight-bold">$7.50</p>
                <p class="has-text-warning">★★★★★</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Fishmongers Product 5 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish5.jpg" alt="Smoked Mackerel">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Coastal Smokehouse</p>
                <p class="title is-6">Smoked Mackerel (2 fillets)</p>
                <p class="has-text-weight-bold">$4.80</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Fishmongers Product 6 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/fishmonger/fish6.jpg" alt="Fresh Oysters">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Deep Sea Delights</p>
                <p class="title is-6">Fresh Oysters (6 pcs)</p>
                <p class="has-text-weight-bold">$9.90</p>
                <p class="has-text-warning">★★★★★</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>


        </div>

        <!-- Pagination
        <nav class="pagination is-centered mt-4" role="navigation">
          <a class="pagination-link is-current">1</a>
          <a class="pagination-link">2</a>
          <a class="pagination-link">3</a>
        </nav> -->

      </div>
    </div>

  </div>
</section>

<?php include '../includes/footer.php'; ?>