<?php
require "header.php";
?>

<div class="spacemaker"></div>

<div class="form signup">
  <div class="form-header-reset">
    <div class="show-signup">Change Password</div>

  </div>
        <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Could not validate your rquest!";

        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ) {

                ?>
                
                <form action="includes/reset-password.inc.php" method="post">
                <div class="form-elements">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <div class="form-element">
                    <input type="password" name="pwd" placeholder="Enter a new password...">
                </div>
                <div class="form-element">
                    <input type="password" name="pwd-repeat" placeholder="Confirm new password...">
            </div>
            <div class="form-element">
                    <button type="submit" name="reset-password-submit">Reset password</button>
            </div>
            </div>
                </form>
                
                
                <?php
            }
        }
        ?>

</div>



<?php
require "footer.php";
?>