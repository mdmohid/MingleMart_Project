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
        <h4 class="title is-5">Greengrocers Products</h4>
        <div class="columns is-multiline" id="product-list">


          <!-- Greengrocers Product 1 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greenapple1.jpg" alt="Fresh Apples">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Green Valley</p>
                <p class="title is-6">Fresh Red Apples (1kg)</p>
                <p class="has-text-weight-bold">$2.99</p>
                <p class="has-text-warning">★★★★★</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Greengrocers Product 2 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greenbanana2.jpg" alt="Organic Bananas">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Nature’s Basket</p>
                <p class="title is-6">Organic Bananas (1kg)</p>
                <p class="has-text-weight-bold">$1.80</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Greengrocers Product 3 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greenbroccoli3.jpg" alt="Fresh Broccoli">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Farm Fresh</p>
                <p class="title is-6">Green Broccoli (500g)</p>
                <p class="has-text-weight-bold">$2.20</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Greengrocers Product 4 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greencarrot4.jpg" alt="Organic Carrots">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Veggie Delight</p>
                <p class="title is-6">Organic Carrots (1kg)</p>
                <p class="has-text-weight-bold">$1.90</p>
                <p class="has-text-warning">★★★★★</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Greengrocers Product 5 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greentomatoes.jpg" alt="Cherry Tomatoes">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Tomato Town</p>
                <p class="title is-6">Cherry Tomatoes (250g)</p>
                <p class="has-text-weight-bold">$2.50</p>
                <p class="has-text-warning">★★★★☆</p>
                <div class="buttons mt-2">
                  <a href="#" class="button is-small is-link">View Details</a>
                  <a href="#" class="button is-small is-primary"><i class="fas fa-cart-plus"></i> Add</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Greengrocers Product 6 -->
          <div class="column is-4">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="../assets/images/greengrocer/greenspinach6.jpg" alt="Baby Spinach">
                </figure>
              </div>
              <div class="card-content">
                <p class="subtitle is-6"><i class="fas fa-store"></i> Leaf & Root</p>
                <p class="title is-6">Baby Spinach (200g)</p>
                <p class="has-text-weight-bold">$2.30</p>
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