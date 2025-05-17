<!-- Bulma CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  .footer-dark {
    background-color: #000;
    color: white;
    padding: 3rem 1.5rem;
  }

  .footer-dark a {
    color: white;
  }

  .footer-dark a:hover {
    text-decoration: underline;
  }

  .footer-dark .title {
    font-size: 1.1rem;
    font-weight: bold;
    color: white;
  }

  .footer-dark .icon {
    font-size: 1.3rem;
    margin-right: 0.75rem;
  }

  .footer-dark .social-icons a {
    margin-right: 15px;
  }

  .footer-dark .payment-methods img {
    height: 32px;
    margin-right: 15px;
    background-color: white;
    padding: 3px;
    border-radius: 4px;
  }

  .footer-bottom-dark {
    background-color: #111;
    text-align: center;
    padding: 1rem 0;
    color: #ccc;
    font-size: 0.9rem;
  }
</style>

<footer class="footer footer-dark">
  <div class="container has-text-centered">
    <div class="columns is-multiline">
      <!-- Contact Info -->
      <div class="column">
        <a href="/MingleMart_Project/index.php">
          <img src="/MingleMart_Project/assets/images/customer/logo.png" alt="MingleMart" style="max-width: 120px; height: auto;" />
        </a>
        <p class="has-text-weight-bold" style="text-decoration: underline;">Contact Information</p>
        <p>Email: minglemart786@gmail.com</p>
        <p>Phone: +123-456-7890</p>
        <p>Address: Thapathali, Kathmandu, Nepal</p>
      </div>

      <!-- Links -->
      <div class="column">
        <h3 class="title">LINKS</h3>
        <ul>
          <li><a href="/MingleMart_Project/index.php">Home</a></li>
          <li><a href="/MingleMart_Project/customer/categories.php">Categories</a></li>
          <li><a href="/MingleMart_Project/customer/contact.php">Contact Us</a></li>
          <!-- <li><a href="#">Profile</a></li> -->
          <li><a href="/MingleMart_Project/customer/cart.php">Cart</a></li>
          <li><a href="/MingleMart_Project/customer/login.php">Login</a> / <a href="/MingleMart_Project/customer/signup.php">Register</a></li>
        </ul>
      </div>

      <!-- Help -->
      <!-- <div class="column">
        <h3 class="title">Help & Support</h3>
        <ul>
          <li><a href="../help&support/faq.php">FAQ</a></li>
          <li><a href="../help&support/returns.php">Return & Refund Policy</a></li>
          <li><a href="../help&support/shipping.php">Shipping Information</a></li>
          <li><a href="../help&support/terms.php">Terms & Conditions</a></li>
          <li><a href="../help&support/privacy.php">Privacy Policy</a></li>
        </ul>
      </div> -->

      <!-- Help -->
      <div class="column">
        <h3 class="title">Help & Support</h3>
        <ul>
          <li><a onclick="openModal('faqModal')">FAQ</a></li>
          <li><a onclick="openModal('returnModal')">Return & Refund Policy</a></li>
          <li><a onclick="openModal('shippingModal')">Shipping Information</a></li>
          <li><a onclick="openModal('termsModal')">Terms & Conditions</a></li>
          <li><a onclick="openModal('privacyModal')">Privacy Policy</a></li>
        </ul>
      </div>




      <!-- Social & Payment -->
      <div class="column">
        <!-- <h3 class="title">Social Media Links</h3>
        <div class="social-icons">
          <a href="#" style="color: #3b5998;"><i class="fab fa-facebook-f icon"></i></a>
          <a href="#" style="color: #E1306C;"><i class="fab fa-instagram icon"></i></a>
          <a href="#" style="color:#1DA1F2;"><i class="fab fa-twitter icon"></i></a>
          <a href="#" style="color: #0077b5;"><i class="fab fa-linkedin-in icon"></i></a>
        </div> -->

        <h3 class="title">Social Media Links</h3>
        <div class="social-icons">
          <a onclick="openModal('modal-facebook')" style="color: #3b5998;"><i class="fab fa-facebook-f icon"></i></a>
          <a onclick="openModal('modal-instagram')" style="color: #E1306C;"><i class="fab fa-instagram icon"></i></a>
          <a onclick="openModal('modal-twitter')" style="color:#1DA1F2;"><i class="fab fa-twitter icon"></i></a>
          <a onclick="openModal('modal-linkedin')" style="color: #0077b5;"><i class="fab fa-linkedin-in icon"></i></a>
        </div>



        <br>
        <!-- <h3 class="title">Payment Methods</h3>
        <div class="payment-methods">
          <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal">
          <img src="https://logos-world.net/wp-content/uploads/2021/03/Stripe-Logo.png" alt="Stripe">
        </div> -->

        <h3 class="title">Payment Methods</h3>
        <div class="payment-methods">
          <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg"
            alt="PayPal"
            style="cursor: pointer;"
            onclick="openModal('modal-paypal')">

          <img src="https://logos-world.net/wp-content/uploads/2021/03/Stripe-Logo.png"
            alt="Stripe"
            style="cursor: pointer;"
            onclick="openModal('modal-stripe')">
        </div>

      </div>
    </div>
  </div>
</footer>

<div class="footer-bottom-dark">
  © 2025 MingleMart. All Rights Reserved
</div>

<?php include 'help-modals.php' ?>
<?php include 'social-modals.php' ?>
<?php include 'payment-modals.php' ?>