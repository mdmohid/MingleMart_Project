<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Checkout - PayPal</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

  <section class="section">
    <h1 class="title">Checkout</h1>

    <div class="box">
      <button class="button is-primary" id="openModal">Pay with PayPal</button>
    </div>

    <!-- PayPal Modal -->
    <div class="modal" id="paymentModal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Pay with PayPal</p>
          <button class="delete" aria-label="close" id="closeModal"></button>
        </header>
        <section class="modal-card-body">
          <p>Click the button below to complete your payment via PayPal.</p>
          <form id="paypal-form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="business" value="sb-1jnvr41155577@business.example.com">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="item_name" value="MingleMart Order">
            <input type="hidden" name="amount" value="189.00">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="http://localhost/MingleMart/payment-success.php">
            <input type="hidden" name="cancel_return" value="http://localhost/MingleMart/payment-cancelled.php">
            <div class="field">
              <div class="control">
                <button class="button is-primary is-fullwidth" type="submit">Proceed to PayPal</button>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </section>

  <script>
    document.getElementById('openModal').addEventListener('click', function() {
      document.getElementById('paymentModal').classList.add('is-active');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
      document.getElementById('paymentModal').classList.remove('is-active');
    });

    document.querySelector('.modal-background').addEventListener('click', function() {
      document.getElementById('paymentModal').classList.remove('is-active');
    });
  </script>

</body>

</html>