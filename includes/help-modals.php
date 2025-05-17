<!-- FAQ Modal -->
<div id="faqModal" class="modal">
  <div class="modal-background" onclick="closeModal('faqModal')"></div>
  <div class="modal-content box">
    <h4 class="title is-4">Frequently Asked Questions (FAQ)</h4>
    <p><strong>Q1: How do I place an order?</strong><br>
      A: Browse our categories, select the product you want, click "Add to Cart", and then proceed to checkout. Follow the steps to enter your details and payment method to complete the order.</p>

    <p><strong>Q2: Can I cancel or modify my order?</strong><br>
      A: Orders can be modified or canceled within 2 hours of placing them. Please contact our support team immediately via email or phone for assistance.</p>

    <p><strong>Q3: What payment methods are accepted?</strong><br>
      A: We accept PayPal, Stripe, Visa, Mastercard, and major debit/credit cards.</p>

    <p><strong>Q4: Do you offer international shipping?</strong><br>
      A: Currently, we only ship within Nepal. International shipping options will be available soon.</p>

    <p><strong>Q5: I didn't receive my order confirmation email. What should I do?</strong><br>
      A: Please check your spam/junk folder. If not found, contact us and we’ll resend the confirmation email.</p>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('faqModal')"></button>
</div>



<!-- Return & Refund Modal -->
<div id="returnModal" class="modal">
  <div class="modal-background" onclick="closeModal('returnModal')"></div>
  <div class="modal-content box">
    <h4 class="title is-4">Return & Refund Policy</h4>
    <p>We strive to ensure customer satisfaction. If you're not completely happy with your purchase, you may return it under the following conditions:</p>

    <ul>
      <li>Items must be returned within 7 days of delivery.</li>
      <li>Products should be unused, in original packaging, and in resellable condition.</li>
      <li>Return shipping costs are the customer's responsibility unless the product is defective or incorrect.</li>
    </ul>

    <p><strong>Refunds:</strong></p>
    <ul>
      <li>Once we receive and inspect the item, a full refund will be processed to your original payment method within 3–5 business days.</li>
      <li>If the return is due to a fault on our side (wrong item or damaged), we’ll bear the return shipping cost.</li>
    </ul>

    <p>Contact our support team to initiate a return or if you have questions.</p>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('returnModal')"></button>
</div>



<!-- Shipping Info Modal -->
<div id="shippingModal" class="modal">
  <div class="modal-background" onclick="closeModal('shippingModal')"></div>
  <div class="modal-content box">
    <h4 class="title is-4">Shipping Information</h4>
    <p>We deliver across Kathmandu and other major cities in Nepal. Orders are typically processed within 1–2 business days.</p>

    <p><strong>Delivery Timeframes:</strong></p>
    <ul>
      <li>Inside Kathmandu Valley: 1–3 working days</li>
      <li>Outside Kathmandu: 3–7 working days depending on location</li>
    </ul>

    <p><strong>Shipping Charges:</strong></p>
    <ul>
      <li>Free shipping on orders over Rs. 2000</li>
      <li>Standard delivery charge of Rs. 100 on orders below Rs. 2000</li>
    </ul>

    <p>We’ll send a tracking link to your email/SMS once your order is dispatched.</p>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('shippingModal')"></button>
</div>



<!-- Terms & Conditions Modal -->
<div id="termsModal" class="modal">
  <div class="modal-background" onclick="closeModal('termsModal')"></div>
  <div class="modal-content box">
    <h4 class="title is-4">Terms & Conditions</h4>
    <p>By accessing and using MingleMart, you agree to the following terms and conditions:</p>

    <ul>
      <li>You must provide accurate account and payment information.</li>
      <li>You agree not to misuse the website for illegal or fraudulent activities.</li>
      <li>All content and images on this site are the property of MingleMart and may not be reused without permission.</li>
      <li>We reserve the right to cancel any order or suspend accounts if fraudulent behavior is suspected.</li>
    </ul>

    <p>Use of our platform constitutes agreement to these terms. We may update this section periodically.</p>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('termsModal')"></button>
</div>



<!-- Privacy Policy Modal -->
<div id="privacyModal" class="modal">
  <div class="modal-background" onclick="closeModal('privacyModal')"></div>
  <div class="modal-content box">
    <h4 class="title is-4">Privacy Policy</h4>
    <p>Your privacy is very important to us. This policy outlines how we collect, use, and protect your personal information:</p>

    <ul>
      <li>We collect your name, email, phone, and address solely for order fulfillment and customer support.</li>
      <li>Your data will never be sold or shared with third parties for marketing purposes.</li>
      <li>We use secure servers and encrypted payment gateways to protect your information.</li>
      <li>You can request your data to be deleted from our system at any time by contacting support.</li>
    </ul>

    <p>By using MingleMart, you agree to this privacy policy. We reserve the right to update it as needed.</p>
  </div>
  <button class="modal-close is-large" aria-label="close" onclick="closeModal('privacyModal')"></button>
</div>


<script>
  function openModal(id) {
    document.getElementById(id).classList.add('is-active');
  }

  function closeModal(id) {
    document.getElementById(id).classList.remove('is-active');
  }
</script>