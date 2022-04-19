<section class="checkout-payment">

            <h2 class="section-heading">Payment Details</h2>


            <div class="payment-form">

                <div class="payment-method">

                    <button class="method selected">
                        <i class="fa-solid fa-credit-card"></i>

                        <span>Credit Card</span>

                        <i id="checkmark" class="fa-solid fa-circle-check"></i>
                    </button>

                    <button class="method">
                        <i class="fa-brands fa-paypal"></i>

                        <span>PayPal</span>

                        <i id="checkmark" class="fa-regular fa-circle-check"></i>
                    </button>

                </div>

                <form action="#">

                    <div class="cardholder-name">
                        <label for="cardholder-name" class="label-default">Cardholder name</label>
                        <input type="text" name="cardholder-name" id="cardholder-name" class="input-default">
                    </div>

                    <div class="card-number">
                        <label for="card-number" class="label-default">Card number</label>
                        <input type="number" name="card-number" id="card-number" class="input-default">
                    </div>

                    <div class="input-flex">

                        <div class="expire-date">
                            <label for="expire-date" class="label-default">Expiration date</label>

                            <div class="input-flex">

                                <input type="number" name="month" id="expire-date" placeholder="12" min="1" max="12"
                                    class="input-default">
                                /
                                <input type="number" name="year" id="expire-date" placeholder="25" min="1" max="99"
                                    class="input-default">

                            </div>
                        </div>

                        <div class="cvv">
                            <label for="cvv" class="label-default">CVV</label>
                            <input type="number" name="cvv" id="cvv" class="input-default">
                        </div>

                    </div>
                    <div class="payment-content">
                        <button class="payment-btn">
                            <b>CONFIRM PAYMENT</b>
                        </button>
                    </div>
                </form>

            </div>

        </section>
