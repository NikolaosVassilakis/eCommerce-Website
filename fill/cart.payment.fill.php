<section class="checkout-payment-method">
<div class="payment-method-form">
<h2 class="section-heading"><i class="fa-solid fa-credit-card"></i> Payment Method</h2>


<div class="payment-container">
<div class="payment-button-container">

<span><img src="img/mercado-pago-logo.png" alt=""></span><i class="fa-solid fa-arrow-right-long"></i> 
<button class="payment-btn" id="MercadoPago" name="Save-Order"></button>

</div>
</div>

<div class="half-flex">
                <div class="payment-content ls">
                <button class="payment-btn-bw" name="Previous-section" onclick="window.location.href='cart.php'">
                    <i class="fa-solid fa-arrow-left"></i>
                    <b>PREVIOUS</b>
                </button>
                </div>

                <div class="rs">
                    
                </div>
            </div>
</div>
</section>
<?php
$_SESSION["approval"] = "false";
?>