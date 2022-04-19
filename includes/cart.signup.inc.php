<?php
if (isset($_POST["submit"])) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../cart.php?error=emptyinput");
        exit();
    }
    if (invalidFirstName($firstname) !== false) {
        header("location: ../cart.php?error=invalidfname");
        exit();
    }
    if (invalidLastName($lastname) !== false) {
        header("location: ../cart.php?error=invalidlname");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../cart.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../cart.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $email) !== false) {
        header("location: ../cart.php?error=usernametaken");
        exit();
    }

    createUserCart($conn, $firstname, $lastname, $email, $pwd);

} else{
    header("location: ../cart.php");
    exit();
}