<?php

function emptyInputSAccount($sfirstname, $slastname, $saddress1, $scountry, $scity, $spostcode, $stelephone) {
    $result;
    if (empty($sfirstname) || empty($slastname) || empty($saddress1) || empty($scountry) || empty($scity) || empty($spostcode) || empty($stelephone)){

        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function emptyInputBAccount($bfirstname, $blastname, $baddress1, $bcountry, $bcity, $bpostcode) {
    $result;
    if (empty($bfirstname) || empty($blastname) || empty($baddress1) || empty($bcountry) || empty($bcity) || empty($bpostcode)){

        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidSDetails1($contenido) {
    $result;
    if (!preg_match("/^[a-z A-Z]*$/", $contenido)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidSDetails2($contenido) {
    $result;
    // if (!preg_match("/^[a-z A-Z0-9#-.,]*$/", $contenido)){
    //     $result = true;
        if (!preg_match("/^[a-z A-Z0-9\#\-\.\,\_]*$/", $contenido)){
            $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidSDetails3($contenido) {
    $result;
    if (!preg_match("/^[a-z A-Z0-9]*$/", $contenido)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidSDetails4($contenido) {
    $result;
    // if (!preg_match("/^[+]+[0-9]*$/", $contenido)){
    //     $result = true;
    // }
    if (!preg_match("/^\+?\d+$/", $contenido)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function addShippingDetails($conn, $sfirstname, $slastname, $scompany, $saddress1, $saddress2, $sASU, $scountry, $scity, $sstate, $spostcode, $stelephone, $id) {
    $query="UPDATE users SET sFirstName=?,sLastName=?,sCompany=?,sAddress1=?,sAddress2=?,sASU=?,sCountry=?,sCity=?,sState=?,sPostcode=?,sTelephone=? WHERE usersId=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'SQL shipping error';
    } else {
        mysqli_stmt_bind_param($stmt, "sssssssssssi",$sfirstname,$slastname,$scompany,$saddress1,$saddress2,$sASU,$scountry,$scity,$sstate,$spostcode,$stelephone,$id);
        mysqli_stmt_execute($stmt);
    }
    session_start();
    $_SESSION["sfirstname"] = $sfirstname;
    $_SESSION["slastname"] = $slastname;
    $_SESSION["scompany"] = $scompany;
    $_SESSION["saddress1"] = $saddress1;
    $_SESSION["saddress2"] = $saddress2;
    $_SESSION["sasu"] = $sASU;
    $_SESSION["scountry"] = $scountry;
    $_SESSION["scity"] = $scity;
    $_SESSION["sstate"] = $sstate;
    $_SESSION["spostcode"] = $spostcode;
    $_SESSION["stelephone"] = $stelephone;
    
    header("location: ../account.php?status=s-success");
}

function addBillingDetails($conn, $bfirstname, $blastname, $bcompany, $baddress1, $baddress2, $bASU, $bcountry, $bcity, $bstate, $bpostcode, $id) {

    $query="UPDATE users SET bFirstName=?,bLastName=?,bCompany=?,bAddress1=?,bAddress2=?,bASU=?,bCountry=?,bCity=?,bState=?,bPostcode=? WHERE usersId=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'SQL billing error';
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssssssi",$bfirstname,$blastname,$bcompany,$baddress1,$baddress2,$bASU,$bcountry,$bcity,$bstate,$bpostcode,$id);
        mysqli_stmt_execute($stmt);
    }

    session_start();
    $_SESSION["bfirstname"] = $bfirstname;
    $_SESSION["blastname"] = $blastname;
    $_SESSION["bcompany"] = $bcompany;
    $_SESSION["baddress1"] = $baddress1;
    $_SESSION["baddress2"] = $baddress2;
    $_SESSION["basu"] = $bASU;
    $_SESSION["bcountry"] = $bcountry;
    $_SESSION["bcity"] = $bcity;
    $_SESSION["bstate"] = $bstate;
    $_SESSION["bpostcode"] = $bpostcode;

    header("Location: ../account.php?status=b-success");
}


// SUBMIT FORM FOR CART PHP 
function addShippingDetailsCart($conn, $sfirstname, $slastname, $scompany, $saddress1, $saddress2, $sASU, $scountry, $scity, $sstate, $spostcode, $stelephone, $id) {
    $query="UPDATE users SET sFirstName=?,sLastName=?,sCompany=?,sAddress1=?,sAddress2=?,sASU=?,sCountry=?,sCity=?,sState=?,sPostcode=?,sTelephone=? WHERE usersId=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'SQL shipping error';
    } else {
        mysqli_stmt_bind_param($stmt, "sssssssssssi",$sfirstname,$slastname,$scompany,$saddress1,$saddress2,$sASU,$scountry,$scity,$sstate,$spostcode,$stelephone,$id);
        mysqli_stmt_execute($stmt);
    }
    session_start();
    $_SESSION["sfirstname"] = $sfirstname;
    $_SESSION["slastname"] = $slastname;
    $_SESSION["scompany"] = $scompany;
    $_SESSION["saddress1"] = $saddress1;
    $_SESSION["saddress2"] = $saddress2;
    $_SESSION["sasu"] = $sASU;
    $_SESSION["scountry"] = $scountry;
    $_SESSION["scity"] = $scity;
    $_SESSION["sstate"] = $sstate;
    $_SESSION["spostcode"] = $spostcode;
    $_SESSION["stelephone"] = $stelephone;
    $_SESSION["approval"] = "true";
    header("location: ../cart.php?status=s-success");
}

function addBillingDetailsCart($conn, $bfirstname, $blastname, $bcompany, $baddress1, $baddress2, $bASU, $bcountry, $bcity, $bstate, $bpostcode, $id) {

    $query="UPDATE users SET bFirstName=?,bLastName=?,bCompany=?,bAddress1=?,bAddress2=?,bASU=?,bCountry=?,bCity=?,bState=?,bPostcode=? WHERE usersId=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'SQL billing error';
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssssssi",$bfirstname,$blastname,$bcompany,$baddress1,$baddress2,$bASU,$bcountry,$bcity,$bstate,$bpostcode,$id);
        mysqli_stmt_execute($stmt);
    }

    session_start();
    $_SESSION["bfirstname"] = $bfirstname;
    $_SESSION["blastname"] = $blastname;
    $_SESSION["bcompany"] = $bcompany;
    $_SESSION["baddress1"] = $baddress1;
    $_SESSION["baddress2"] = $baddress2;
    $_SESSION["basu"] = $bASU;
    $_SESSION["bcountry"] = $bcountry;
    $_SESSION["bcity"] = $bcity;
    $_SESSION["bstate"] = $bstate;
    $_SESSION["bpostcode"] = $bpostcode;

    header("Location: ../cart.php?status=b-success");
}

?>