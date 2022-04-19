<section class="checkout-payment-shipping">

    <h2 class="section-heading"><i class="fa-solid fa-truck"></i> Shipping Details</h2>

    <div class="payment-form">

        <form action="includes/cart.shipping.inc.php" method="post">
            <input type="hidden" name="userid" value="<?= $_SESSION['userid'] ?>">


            <div class="half-flex">
                <div class="account-input-container ls">
                    <label for="s-firstName" class="label-default">First Name <span class="asterisk">*</span></label>
                    <input type="text" name="sfn" id="s-firstName" class="input-default"
                        value="<?= $_SESSION['sfirstname']; ?>" required>
                </div>

                <div class="account-input-container rs">
                    <label for="s-lastName" class="label-default">Last Name <span class="asterisk">*</span></label>
                    <input type="text" name="sln" id="s-lastName" class="input-default"
                        value="<?= $_SESSION['slastname']; ?>" required>
                </div>
            </div>

            <div class="account-input-container">
                <label for="s-company" class="label-default">Company</label>
                <input type="text" name="scom" id="s-company" class="input-default"
                    value="<?= $_SESSION['scompany']; ?>">
            </div>

            <div class="account-input-container">
                <label for="s-address1" class="label-default">Address 1 <span class="asterisk">*</span></label>
                <input type="text" name="sad1" id="s-address1" class="input-default"
                    value="<?= $_SESSION['saddress1']; ?>" required>
            </div>

            <div class="account-input-container">
                <label for="s-address2" class="label-default">Address 2</label>
                <input type="text" name="sad2" id="s-address2" class="input-default"
                    value="<?= $_SESSION['saddress2']; ?>">
            </div>

            <div class="account-input-container">
                <label for="s-asu" class="label-default">No. of House /Appartment / Suite / Unit / etc</label>
                <input type="text" name="sasu" id="s-asu" class="input-default" value="<?= $_SESSION['sasu']; ?>">
            </div>

            <div class="half-flex">
                <div class="account-input-container ls">
                    <label for="s-country" class="label-default">Country <span class="asterisk">*</span></label>
                    <input type="text" name="scou" id="s-country" class="input-default"
                        value="<?= $_SESSION['scountry']; ?>" required>
                </div>

                <div class="account-input-container rs">
                    <label for="s-city" class="label-default">Town / City <span class="asterisk">*</span></label>
                    <input type="text" name="sct" id="s-city" class="input-default" value="<?= $_SESSION['scity']; ?>"
                        required>
                </div>
            </div>

            <div class="account-input-container">
                <label for="s-state" class="label-default">State</label>
                <input type="text" name="st" id="s-state" class="input-default" value="<?= $_SESSION['sstate']; ?>">
            </div>
            <div class="half-flex">
                <div class="account-input-container ls">
                    <label for="s-postcode" class="label-default">Postcode <span class="asterisk">*</span></label>
                    <input type="text" name="spc" id="s-postcode" class="input-default"
                        value="<?= $_SESSION['spostcode']; ?>" required>
                </div>

                <div class="account-input-container rs">
                    <label for="s-telephone" class="label-default">Telephone number <span
                            class="asterisk">*</span></label>
                    <input type="tel" name="stl" id="s-telephone" class="input-default"
                        value="<?= $_SESSION['stelephone']; ?>" required>
                </div>
            </div>

            <div class="account-error-message">
                <?php
// PARAMETERS FOR SHIPPING
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinputS") {
        echo "<p>Please fill make sure to fill all necessary fields!</p>";
    }
    else if ($_GET["error"] == "invalidsfirstname"){
        echo "<p>Invalid First Name!</p>";
    }
    else if ($_GET["error"] == "invalidslastname"){
      echo "<p>Invalid Last Name!</p>";
  }
    else if ($_GET["error"] == "invalidscountry"){
        echo "<p>Invalid Country!</p>";
    }    
    else if ($_GET["error"] == "invalidscity"){
        echo "<p>Invalid City!</p>";
    }
    else if ($_GET["error"] == "invalidsstate"){
        echo "<p>Invalid State!</p>";
    }
    else if ($_GET["error"] == "invalidsaddress1"){
        echo "<p>Invalid Address #1!</p>";
    }
    else if ($_GET["error"] == "invalidsaddress2"){
        echo "<p>Invalid Address #2!</p>";
    }
    else if ($_GET["error"] == "invalidscompany"){
        echo "<p>Invalid Company!</p>";
    }
    else if ($_GET["error"] == "invalidsasu"){
        echo "<p>Invalid Number of App/Suite/Unit/etc.!</p>";
    }
    else if ($_GET["error"] == "invalidspostcode"){
        echo "<p>Invalid Postcode!</p>";
    }
    else if ($_GET["error"] == "invalidstelephone"){
        echo "<p>Invalid Telephone!</p>";
    }

  }
?>
            </div>

            <div class="half-flex">
                <div class="ls"></div>

                <div class="payment-content rs">
                    <button class="payment-btn-fw" name="save-shipping">
                        <b>NEXT</b>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>


        </form>

    </div>

</section>











<script>
    const tel = document.getElementById('s-telephone');

    tel.addEventListener('input', function () {
        let start = this.selectionStart;
        let end = this.selectionEnd;

        const current = this.value
        const corrected = current.replace(/([^+0-9])/gi, '');
        this.value = corrected;

        if (corrected.length < current.length) --end;
        this.setSelectionRange(start, end);
    });
</script>