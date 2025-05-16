<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MingleMart</title>
  <style>
    .carousel {
      display: flex;
      overflow: hidden;
      /* border-radius: 20px; */
    }

    .carousel-item {
      flex: 0 0 100%;
    }

    .carousel-img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    /* .image img {
      border-radius: 10px;
    }

    .button.is-dark.is-outlined:hover {
      background-color: #00bcd4;
      color: white;
      border-color: #00bcd4;
    }

    .section {
      padding-top: 3rem;
      padding-bottom: 3rem;
    } */
  </style>

</head>

<body>
  <!-- Carousel Section -->
  <section class="section">
    <div class="container">
      <div class="carousel">
        <div class="carousel-item">
          <img src="/MingleMart_Project/assets/images/customer/veg2.jpg" alt="Slide 1" class="carousel-img">
        </div>
        <div class="carousel-item">
          <img src="/MingleMart_Project/assets/images/customer/banner.jpg" alt="Slide 2" class="carousel-img">
        </div>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section class="section">
    <div class="container">
      <h2 class="title has-text-centered">Categories</h2>
      <p class="subtitle has-text-centered">Discover top categories featuring farm-fresh produce, premium meats, and finest liquor — all in one place.</p>
      <div class="columns">
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/food.jpg" alt="Food">
          </figure>
          <p class="has-text-weight-bold mt-3">Food</p>
        </div>
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/catogery.jpg" alt="Meat">
          </figure>
          <p class="has-text-weight-bold mt-3">Meat</p>
        </div>
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/liquor.jpg" alt="Liquor">
          </figure>
          <p class="has-text-weight-bold mt-3">Liquor</p>
        </div>
      </div>
      <div class="has-text-centered mb-5">
        <button class="button is-small is-dark is-outlined">Shop All</button>
      </div>
    </div>
  </section>

  <!-- Fresh Products Section -->
  <section class="section">
    <div class="container">
      <h2 class="title has-text-centered">Our Fresh Products</h2>
      <p class="subtitle has-text-centered">Handpicked products from local farms and trusted suppliers — bringing freshness to your doorstep.</p>
      <div class="columns">
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/freshveg.jpg" alt="Fresh Veg">
          </figure>
        </div>
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/freshbakery.jpg" alt="Fresh Bakery">
          </figure>
        </div>
        <div class="column has-text-centered">
          <figure class="image is-square">
            <img src="/MingleMart_Project/assets/images/customer/freshmeat.jpg" alt="Fresh Meat">
          </figure>
        </div>
      </div>
      <div class="has-text-centered mb-5">
        <button class="button is-small is-dark is-outlined">Shop All</button>
      </div>
    </div>
  </section>

  <!-- Our Products Section -->
  <section class="section">
    <div class="container">
      <h2 class="title has-text-centered">Our Products</h2>
      <p class="subtitle has-text-centered">Explore a wide variety of fresh, organic, and gourmet items tailored for your everyday needs.</p>
      <div class="columns">
        <div class="column has-text-centered">
          <div class="box">
            <figure class="image is-square">
              <img src="/MingleMart_Project/assets/images/customer/1bread.jpg" alt="Bread">
            </figure>
            <p class="has-text-weight-bold mt-3">BREAD</p>
            <p>$99</p>
          </div>
        </div>
        <div class="column has-text-centered">
          <div class="box">
            <figure class="image is-square">
              <img src="/MingleMart_Project/assets/images/customer/dates.jpg" alt="Dates">
            </figure>
            <p class="has-text-weight-bold mt-3">Dates</p>
            <p>$99</p>
          </div>
        </div>
        <div class="column has-text-centered">
          <div class="box">
            <figure class="image is-square">
              <img src="/MingleMart_Project/assets/images/customer/meatbanner.jpg" alt="Meat">
            </figure>
            <p class="has-text-weight-bold mt-3">MEAT</p>
            <p>$99</p>
          </div>
        </div>
      </div>
      <div class="has-text-centered mb-5">
        <button class="button is-small is-dark is-outlined">Product Details</button>
      </div>
    </div>
  </section>


</body>

</html>