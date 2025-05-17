<!-- PayPal Modal -->
<div id="modal-paypal" class="modal">
  <div class="modal-background" onclick="closeModal('modal-paypal')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Secure Checkout with PayPal</h3>
    <p>Pay quickly and safely using your PayPal account or credit/debit card via PayPal.</p>
    <a href="https://www.paypal.com/" class="button is-warning mt-3" target="_blank">Visit PayPal</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-paypal')"></button>
</div>

<!-- Stripe Modal -->
<div id="modal-stripe" class="modal">
  <div class="modal-background" onclick="closeModal('modal-stripe')"></div>
  <div class="modal-content box has-text-centered">
    <h3 class="title is-4">Fast & Easy Payments via Stripe</h3>
    <p>Use your credit or debit card with industry-leading security powered by Stripe.</p>
    <a href="https://stripe.com/" class="button is-link mt-3" target="_blank">Visit Stripe</a>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('modal-stripe')"></button>
</div>



<script>
  function openModal(id) {
    document.getElementById(id).classList.add('is-active');
  }

  function closeModal(id) {
    document.getElementById(id).classList.remove('is-active');
  }
</script>