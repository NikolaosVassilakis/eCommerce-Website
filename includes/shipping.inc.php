<?php

// SHIPPING 
// $sfirstname="";
// $slastname="";
// $scompany="";
// $saddress1="";
// $saddress2="";
// $sASU="";
// $scountry="";
// $scity="";
// $sstate="";
// $spostcode="";
// $stelephone="";

// BILLING 
// $bfirstname="";
// $blastname="";
// $bcompany="";
// $baddress1="";
// $baddress2="";
// $bASU="";
// $bcountry="";
// $bcity="";
// $bstate="";
// $bpostcode="";

// SHIPPING 
if(isset($_POST["save-shipping"])){

    
    $id = $_POST["userid"];

    $sfirstname=$_POST["sfn"];
    $slastname=$_POST["sln"];
    $scompany=$_POST["scom"];
    $saddress1=$_POST["sad1"];
    $saddress2=$_POST["sad2"];
    $sASU=$_POST["sasu"];
    $scountry=$_POST["scou"];
    $scity=$_POST["sct"];
    $sstate=$_POST["st"];
    $spostcode=$_POST["spc"];
    $stelephone=$_POST["stl"];

    require_once "dbh.inc.php";
    require_once "details.function.inc.php";



    if (emptyInputSAccount($sfirstname, $slastname, $saddress1, $scountry, $scity, $spostcode, $stelephone) !== false) {
        header("location: ../account.php?error=emptyinputS");
        exit();
    }

    // SOLO LETRAS Y ESPACIO 
    if (invalidSDetails1($sfirstname) !== false) {
        header("location: ../account.php?error=invalidsfirstname");
        exit();
    }
    if (invalidSDetails1($slastname) !== false) {
        header("location: ../account.php?error=invalidslastname");
        exit();
    }
    if (invalidSDetails1($scountry) !== false) {
        header("location: ../account.php?error=invalidscountry");
        exit();
    }
    if (invalidSDetails1($scity) !== false) {
        header("location: ../account.php?error=invalidscity");
        exit();
    }
    if (invalidSDetails1($sstate) !== false) {
        header("location: ../account.php?error=invalidsstate");
        exit();
    }

    // SOLO LETRAS NUMBEROS EPSACIO GUION HASH PUNTO Y COMA
    if (invalidSDetails2($saddress1) !== false) {
        header("location: ../account.php?error=invalidsaddress1");
        exit();
    }
    if (invalidSDetails2($saddress2) !== false) {
        header("location: ../account.php?error=invalidsaddress2");
        exit();
    }
    if (invalidSDetails2($scompany) !== false) {
        header("location: ../account.php?error=invalidscompany");
        exit();
    }
    if (invalidSDetails2($sASU) !== false) {
        header("location: ../account.php?error=invalidsasu");
        exit();
    }

    // SOLO NUMEROS LETRAS Y ESPACIO
    if (invalidSDetails3($spostcode) !== false) {
        header("location: ../account.php?error=invalidspostcode");
        exit();
    }

    // SOLO NUMEROS LETRAS Y ESPACIO
    if (invalidSDetails4($stelephone) !== false) {
        header("location: ../account.php?error=invalidstelephone");
        exit();
    }

    addShippingDetails($conn, $sfirstname, $slastname, $scompany, $saddress1, $saddress2, $sASU, $scountry, $scity, $sstate, $spostcode, $stelephone, $id);


} else {
    header("Location: ../account.php?error=noSPost");
    exit();
}

?>