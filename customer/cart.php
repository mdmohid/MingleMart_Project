<?php include 'includes/header.php'; ?>
    <section class="section">
        <h1 class="title">Your Cart</h1>
        <p>Not ready to checkout? <a href="index.php">Continue Shopping</a></p>
        <div class="columns">
            <div class="column is-8">
                <div class="box">
                    <div class="columns">
                        <div class="column is-3">
                            <figure class="image is-128x128">
                                <img src="https://via.placeholder.com/128x128" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: L</p>
                            <p>Quantity: 1</p>
                            <p>$99</p>
                            <p>by Vendor Name</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="columns">
                        <div class="column is-3">
                            <figure class="image is-128x128">
                                <img src="https://via.placeholder.com/128x128" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: S</p>
                            <p>Quantity: 1</p>
                            <p>$89</p>
                            <p>by Vendor Name</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="box">
                    <h2 class="subtitle">Order Summary</h2>
                    <div class="field">
                        <label class="label">Enter coupon code here</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Coupon Code">
                        </div>
                    </div>
                    <p>Subtotal: $188</p>
                    <p>Shipping: Calculated at the next step</p>
                    <p><strong>Total: $188</strong></p>
                    <a href="checkout.php" class="button is-primary is-fullwidth">Continue to Checkout</a>
                </div>
            </div>
        </div>
        <h2 class="subtitle">Order Information</h2>
        <p><strong>Return Policy</strong></p>
        <p>This is our example return policy which is everything you need to know about our returns.</p>
        <p><strong>Shipping Options</strong></p>
    </section>
<?php include 'includes/footer.php'; ?>