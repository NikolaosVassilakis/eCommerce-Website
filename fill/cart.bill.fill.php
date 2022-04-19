<section class="checkout-billing">

            <h2 class="section-heading">2) Billing Details</h2>

            <div class="payment-form">

                <form action="includes/cart.billing.inc.php" method="post">
                <input type="hidden" name="userid" value="<?= $_SESSION['userid'] ?>">


                    <div class="half-flex">
                        <div class="account-input-container ls">
                            <label for="b-firstName" class="label-default">First Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="bfn" id="b-firstName" class="input-default" value="<?= $_SESSION['bfirstname']; ?>" required>
                        </div>

                        <div class="account-input-container rs">
                            <label for="b-lastName" class="label-default">Last Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="bln" id="b-lastName" class="input-default" value="<?= $_SESSION['blastname']; ?>" required>
                        </div>
                    </div>

                    <div class="account-input-container">
                        <label for="b-company" class="label-default">Company</label>
                        <input type="text" name="bcom" id="b-company" class="input-default" value="<?= $_SESSION['bcompany']; ?>">
                    </div>

                    <div class="account-input-container">
                        <label for="b-address1" class="label-default">Address 1 <span class="asterisk">*</span></label>
                        <input type="text" name="bad1" id="b-address1" class="input-default" value="<?= $_SESSION['baddress1']; ?>" required>
                    </div>

                    <div class="account-input-container">
                        <label for="b-address2" class="label-default">Address 2</label>
                        <input type="text" name="bad2" id="b-address2" class="input-default" value="<?= $_SESSION['baddress2']; ?>">
                    </div>

                    <div class="account-input-container">
                        <label for="b-asu" class="label-default">Appartment / Suite / Unit / etc</label>
                        <input type="text" name="basu" id="b-asu" class="input-default" value="<?= $_SESSION['basu']; ?>">
                    </div>

                    <div class="half-flex">
                        <div class="account-input-container ls">
                            <label for="b-country" class="label-default">Country <span class="asterisk">*</span></label>
                            <input type="text" name="bcou" id="b-country" class="input-default" value="<?= $_SESSION['bcountry']; ?>" required>
                        </div>

                        <div class="account-input-container rs">
                            <label for="b-city" class="label-default">Town / City <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="bct" id="b-city" class="input-default" value="<?= $_SESSION['bcity']; ?>" required>
                        </div>
                    </div>

                    <div class="half-flex">
                    <div class="account-input-container ls">
                        <label for="b-state" class="label-default">State</label>
                        <input type="text" name="bt" id="b-state" class="input-default" value="<?= $_SESSION['bstate']; ?>">
                    </div>
                    
                        <div class="account-input-container rs">
                            <label for="b-postcode" class="label-default">Postcode <span
                                    class="asterisk">*</span></label>
                            <input type="text" name="bpc" id="b-postcode" class="input-default" value="<?= $_SESSION['bpostcode']; ?>" required>
                        </div>
                    </div>

                    <div class="account-error-message">
                    <?php
// PARAMETERS FOR BILLING
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinputB") {
        echo "<p>Please fill make sure to fill all necessary fields!</p>";
    }
    else if ($_GET["error"] == "invalidbfirstname"){
        echo "<p>Invalid First Name!</p>";
    }
    else if ($_GET["error"] == "invalidblastname"){
      echo "<p>Invalid Last Name!</p>";
  }
    else if ($_GET["error"] == "invalidbcountry"){
        echo "<p>Invalid Country!</p>";
    }    
    else if ($_GET["error"] == "invalidbcity"){
        echo "<p>Invalid City!</p>";
    }
    else if ($_GET["error"] == "invalidbstate"){
        echo "<p>Invalid State!</p>";
    }
    else if ($_GET["error"] == "invalidbaddress1"){
        echo "<p>Invalid Address #1!</p>";
    }
    else if ($_GET["error"] == "invalidbaddress2"){
        echo "<p>Invalid Address #2!</p>";
    }
    else if ($_GET["error"] == "invalidbcompany"){
        echo "<p>Invalid Company!</p>";
    }
    else if ($_GET["error"] == "invalidbasu"){
        echo "<p>Invalid Number of App/Suite/Unit/etc.!</p>";
    }
    else if ($_GET["error"] == "invalidbpostcode"){
        echo "<p>Invalid Postcode!</p>";
    }
    else if ($_GET["error"] == "invalidbtelephone"){
        echo "<p>Invalid Telephone!</p>";
    }

  }
?>
                    </div>


                    <div class="payment-content">
                        <button class="payment-btn" name="save-billing">
                            <b>SAVE DETAILS</b>
                        </button>
                    </div>

                </form>

            </div>

        </section>