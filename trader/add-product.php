<?php include '../includes/header.php'; ?>

<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Add Product</h1>

    <div class="columns">
      <div class="column is-one-third">
        <figure class="image is-square">
          <div class="has-background-grey-lighter has-text-centered" style="height: 250px; display: flex; align-items: center; justify-content: center;">
            <p>Photo</p>
          </div>
        </figure>
      </div>

      <div class="column">
        <form action="save-product.php" method="POST" enctype="multipart/form-data">
          <div class="field">
            <label class="label">Product Name</label>
            <div class="control">
              <input class="input" type="text" name="product_name" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Description</label>
            <div class="control">
              <textarea class="textarea" name="description" required></textarea>
            </div>
          </div>

          <div class="field">
            <label class="label">Allergy Information</label>
            <div class="control">
              <textarea class="textarea" name="allergy_info"></textarea>
            </div>
          </div>

          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label">Price</label>
                <div class="control">
                  <input class="input" type="number" step="0.01" name="price" required>
                </div>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">Quantity</label>
                <div class="control">
                  <input class="input" type="number" name="quantity" required>
                </div>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">Weight</label>
            <div class="control">
              <input class="input" type="text" name="weight">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-dark is-fullwidth" type="submit">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>