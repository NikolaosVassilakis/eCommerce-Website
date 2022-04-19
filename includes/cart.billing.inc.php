<?php
if(isset($_POST["save-billing"])){

require_once "dbh.inc.php";
require_once "details.function.inc.php";

$id = $_POST["userid"];

$bfirstname=$_POST["bfn"];
$blastname=$_POST["bln"];
$bcompany=$_POST["bcom"];
$baddress1=$_POST["bad1"];
$baddress2=$_POST["bad2"];
$bASU=$_POST["basu"];
$bcountry=$_POST["bcou"];
$bcity=$_POST["bct"];
$bstate=$_POST["bt"];
$bpostcode=$_POST["bpc"];



if (emptyInputBAccount($bfirstname, $blastname, $baddress1, $bcountry, $bcity, $bpostcode) !== false) {
    header("location: ../cart.php?error=emptyinputB");
    exit();
}

// SOLO LETRAS Y ESPACIO 
if (invalidSDetails1($bfirstname) !== false) {
    header("location: ../cart.php?error=invalidbfirstname");
    exit();
}
if (invalidSDetails1($blastname) !== false) {
    header("location: ../cart.php?error=invalidblastname");
    exit();
}
if (invalidSDetails1($bcountry) !== false) {
    header("location: ../cart.php?error=invalidbcountry");
    exit();
}
if (invalidSDetails1($bcity) !== false) {
    header("location: ../cart.php?error=invalidbcity");
    exit();
}
if (invalidSDetails1($bstate) !== false) {
    header("location: ../cart.php?error=invalidbstate");
    exit();
}

// SOLO LETRAS NUMBEROS EPSACIO GUION HASH PUNTO Y COMA
if (invalidSDetails2($baddress1) !== false) {
    header("location: ../cart.php?error=invalidbaddress1");
    exit();
}
if (invalidSDetails2($baddress2) !== false) {
    header("location: ../cart.php?error=invalidbaddress2");
    exit();
}
if (invalidSDetails2($bcompany) !== false) {
    header("location: ../cart.php?error=invalidbcompany");
    exit();
}
if (invalidSDetails2($bASU) !== false) {
    header("location: ../cart.php?error=invalidbasu");
    exit();
}

// SOLO NUMEROS LETRAS Y ESPACIO
if (invalidSDetails3($bpostcode) !== false) {
    header("location: ../cart.php?error=invalidbpostcode");
    exit();
}

addBillingDetailsCart($conn, $bfirstname, $blastname, $bcompany, $baddress1, $baddress2, $bASU, $bcountry, $bcity, $bstate, $bpostcode, $id);

} else {
header("Location: ../cart.php?error=noBPost");
exit();
}
?>