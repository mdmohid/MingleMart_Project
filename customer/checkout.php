<?php include 'includes/header.php'; ?>
    <section class="section">
        <h1 class="title">Checkout</h1>
        <div class="tabs">
            <ul>
                <li><a>Address</a></li>
                <li><a>Shipping</a></li>
                <li class="is-active"><a>Payment</a></li>
            </ul>
        </div>
        <div class="columns">
            <div class="column is-8">
                <div class="box">
                    <div class="buttons">
                        <button class="button is-primary">PayPal</button>
                        <button class="button is-dark">Credit Card</button>
                    </div>
                    <h2 class="subtitle">Payment Details</h2>
                    <form action="invoice.php" method="POST">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Card Number</label>
                            <div class="control">
                                <input class="input" type="text" name="card_number" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-dark is-fullwidth" type="submit">Pay Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-4">
                <div class="box">
                    <h2 class="subtitle">Your Cart</h2>
                    <div class="columns">
                        <div class="column is-4">
                            <figure class="image is-64x64">
                                <img src="https://via.placeholder.com/64x64" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: L</p>
                            <p>$99</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-4">
                            <figure class="image is-64x64">
                                <img src="https://via.placeholder.com/64x64" alt="Product">
                            </figure>
                        </div>
                        <div class="column">
                            <p><strong>Natural Honey Bottle</strong></p>
                            <p>Size: S</p>
                            <p>$89</p>
                            <a href="#" class="button is-danger is-small">Remove</a>
                        </div>
                    </div>
                    <p><strong>$189</strong></p>
                </div>
            </div>
        </div>
    </section>
<?php include 'includes/footer.php'; ?>