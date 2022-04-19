<div class="spacemaker"></div>
<div class="login-error-message">
  <!-- PASSWORD RESET / NEW PASSWORD CONFIRMATION -->
  <?php
  if (isset($_GET["newpwd"])){
    if ($_GET["newpwd"] == "passwordupdated"){
      echo '<p class="signupsuccess">Your password has been reset!</p>';
    }
  }

  if (isset($_GET["reset"])){
    if($_GET["reset"] == "success"){
      echo '<p class="signupsuccess">Check your e-mail!</p>';
    }
  }
  ?>

  <!-- EMPTY INPUT / WRONG LOGIN -->
  <?php 
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinputlogin") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET["error"] == "wronglogin"){
        echo "<p>Incorrect Log in information!</p>";
    }
  }
  
  // PARAMETERS FOR SIGNING UP
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invalidfname"){
        echo "<p>Choose a proper First Name!</p>";
    }
    else if ($_GET["error"] == "invalidlname"){
      echo "<p>Choose a proper Last Name!</p>";
  }
    else if ($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email!</p>";
    }    
    else if ($_GET["error"] == "passwordsdontmatch"){
        echo "<p>Passwords doesn't match!</p>";
    }
    else if ($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong, try again!</p>";
    }
    else if ($_GET["error"] == "usernametaken"){
        echo "<p>Email already taken!</p>";
    }
    else if ($_GET["error"] == "none"){
        echo "<p>User signed up!</p>";
    }
  }
?>
</div>
<div class="form signup">
  <div class="form-header">
    <div class="show-signup">Sign up</div>
    <div class="show-signin" style="white-space: nowrap;">Sign in</div>
    <div class="show-reset" style="white-space: nowrap;">Reset</div>
  </div>
  <div class="arrow"></div>


  <form name="logsignform"action="includes/signup.inc.php" method="post">

  <div class="form-elements">
    <div class="form-element">
      <input name="firstname" type="text" autocomplete="off" placeholder="First Name... *" required>
    </div>
    <div class="form-element">
      <input name="lastname" type="text" autocomplete="off" placeholder="Last Name... *" required>
    </div>
    <div class="form-element">
      <input name="email" type="text" autocomplete="off" placeholder="Email... *" required>
    </div>
    <div class="form-element">
      <input name="pwd" type="password" autocomplete="off" placeholder="Password... *" required>
    </div>
    <div class="form-element">
      <input name="pwdrepeat" type="password" autocomplete="off" placeholder="Confirm Password... *" required>
    </div>
    <div class="form-element">
      <button  type="submit" name="submit" id="submit-btn">Register</button>
    </div>
    <div class="form-element">
    <p>Please fill all the required information to Register</p>
    <!-- <p>Favor de llenar todos los datos correspndientes para el registro</p> -->
    </div>
    <div class="form-element">
    <p>Please insert all your information to Login</p>
    <!-- <p>Escribir tus datos para iniciar sesion</p> -->
    </div>
    <div class="form-element">
    <p>An email will be sent to you for the renewal of your Password</p>
    <!-- <p>Un correo electronico sera enviado para el reinicio de su contraseña</p> -->
    </div>

  </div>
  

  </form>



</div>

<!-- LOGIN SCRIPT  -->
<script src="javascript/login.js"></script>


