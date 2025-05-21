<!-- Bulma CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Trigger Button
<button class="button is-primary" id="openPaymentModal">
  <span class="icon"><i class="fas fa-wallet"></i></span>
  <span>Choose Payment Method</span>
</button> -->

<!-- Payment Method Modal -->
<div class="modal" id="paymentModal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Select Payment Method</p>
      <button class="delete" aria-label="close" id="closeModal"></button>
    </header>
    <section class="modal-card-body">
      <p class="title is-6 mb-3">Choose how you want to pay:</p>
      <div class="buttons">
        <a href="https://www.paypal.com/" class="button is-link is-medium">
          <span class="icon"><i class="fab fa-paypal"></i></span>
          <span>PayPal</span>
        </a>
        <a href="credit-card.php" class="button is-info is-medium">
          <span class="icon"><i class="fas fa-credit-card"></i></span>
          <span>Credit Card</span>
        </a>
        <a href="cod.php" class="button is-dark is-medium">
          <span class="icon"><i class="fas fa-box"></i></span>
          <span>Cash on Delivery</span>
        </a>
      </div>
    </section>
    <footer class="modal-card-foot is-justify-content-flex-end">
      <button class="button" id="cancelModal">Cancel</button>
    </footer>
  </div>
</div>

<!-- Modal Control Script -->
<!-- <script>
  // const modal = document.getElementById('paymentModal');
  // const openBtn = document.getElementById('openPaymentModal');
  // const closeBtn = document.getElementById('closeModal');
  // const cancelBtn = document.getElementById('cancelModal');

  // openBtn.addEventListener('click', () => {
  //   modal.classList.add('is-active');
  // });

  // closeBtn.addEventListener('click', () => {
  //   modal.classList.remove('is-active');
  // });

  // cancelBtn.addEventListener('click', () => {
  //   modal.classList.remove('is-active');
  // });

  // // Optional: Close modal when clicking outside
  // modal.querySelector('.modal-background').addEventListener('click', () => {
  //   modal.classList.remove('is-active');
  // });


  const modal = document.getElementById('paymentModal');
  // Remove references to openBtn, since button is gone
  const closeBtn = document.getElementById('closeModal');
  const cancelBtn = document.getElementById('cancelModal');

  // Show modal immediately on page load
  window.addEventListener('DOMContentLoaded', () => {
    modal.classList.add('is-active');
  });

  closeBtn.addEventListener('click', () => {
    modal.classList.remove('is-active');
  });

  cancelBtn.addEventListener('click', () => {
    modal.classList.remove('is-active');
  });

  // Close modal when clicking outside
  modal.querySelector('.modal-background').addEventListener('click', () => {
    modal.classList.remove('is-active');
  });
</script> -->




<script>
  const modal = document.getElementById('paymentModal');
  const closeBtn = document.getElementById('closeModal');
  const cancelBtn = document.getElementById('cancelModal');

  // URL to redirect after closing modal
  const productDetailURL = '../trader/product-detail.php'; // change this to your actual product detail URL

  window.addEventListener('DOMContentLoaded', () => {
    modal.classList.add('is-active');
  });

  function closeModalAndRedirect() {
    modal.classList.remove('is-active');
    // Redirect after modal closes
    window.location.href = productDetailURL;
  }

  closeBtn.addEventListener('click', closeModalAndRedirect);
  cancelBtn.addEventListener('click', closeModalAndRedirect);

  modal.querySelector('.modal-background').addEventListener('click', closeModalAndRedirect);
</script>