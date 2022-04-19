<?php

function emptyInputSignup($firstname, $lastname, $email, $pwd, $pwdRepeat) {
    $result;
    if(empty($firstname) || empty($lastname) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidFirstName($firstname) {
    $result;
    if (!preg_match("/^[a-z A-Z]*$/", $firstname)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidLastName($lastname) {
    $result;
    if (!preg_match("/^[a-z A-Z]*$/", $lastname)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function uidExists($conn, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }

    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $email, $pwd) {
    $sql = "INSERT INTO users (sFirstName, sLastName, usersEmail, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    loginUser($conn, $email, $pwd);
    // header("location: ../index.php?error=none");
    exit();

}

// CREATE USER ON CART PHP 
function createUserCart($conn, $firstname, $lastname, $email, $pwd) {
    $sql = "INSERT INTO users (sFirstName, sLastName, usersEmail, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    loginUserCart($conn, $email, $pwd);
    // header("location: ../index.php?error=none");
    exit();

}

function emptyInputLogin($email, $pwd) {
    $result;
    if(empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
        }
        return $result;
}

function loginUser($conn, $email, $pwd) {
    $uidExists = uidExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"]; 
            $_SESSION["usertype"] = $uidExists["userType"];
            $_SESSION["useremail"] = $uidExists["usersEmail"];


            $_SESSION["sfirstname"] = $uidExists["sFirstName"];
            $_SESSION["slastname"] = $uidExists["sLastName"];
            $_SESSION["scompany"] = $uidExists["sCompany"];
            $_SESSION["saddress1"] = $uidExists["sAddress1"];
            $_SESSION["saddress2"] = $uidExists["sAddress2"];
            $_SESSION["sasu"] = $uidExists["sASU"];
            $_SESSION["scountry"] = $uidExists["sCountry"];
            $_SESSION["scity"] = $uidExists["sCity"];
            $_SESSION["sstate"] = $uidExists["sState"];
            $_SESSION["spostcode"] = $uidExists["sPostcode"];
            $_SESSION["stelephone"] = $uidExists["sTelephone"];

            $_SESSION["bfirstname"] = $uidExists["bfirstname"];
            $_SESSION["blastname"] = $uidExists["bLastName"];
            $_SESSION["bcompany"] = $uidExists["bCompany"];
            $_SESSION["baddress1"] = $uidExists["bAddress1"];
            $_SESSION["baddress2"] = $uidExists["bAddress2"];
            $_SESSION["basu"] = $uidExists["bASU"];
            $_SESSION["bcountry"] = $uidExists["bCountry"];
            $_SESSION["bcity"] = $uidExists["bCity"];
            $_SESSION["bstate"] = $uidExists["bState"];
            $_SESSION["bpostcode"] = $uidExists["bPostcode"];

            $_SESSION["approval"] = "false";









            if($uidExists["userType"]=="user"){
                header("Location: ../index.php");
            }
            else if($uidExists["userType"]=="admin"){
                header("Location: ../index.php");
            }
            else{
                echo "no priviledges adquired";
            }
            //header("location: ../index.php");
            //exit();
                }
}

// LOGIN USER FOR CART PHP 
function loginUserCart($conn, $email, $pwd) {
    $uidExists = uidExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../cart.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../cart.php?error=wronglogin");
        exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"]; 
            $_SESSION["usertype"] = $uidExists["userType"];
            $_SESSION["useremail"] = $uidExists["usersEmail"];


            $_SESSION["sfirstname"] = $uidExists["sFirstName"];
            $_SESSION["slastname"] = $uidExists["sLastName"];
            $_SESSION["scompany"] = $uidExists["sCompany"];
            $_SESSION["saddress1"] = $uidExists["sAddress1"];
            $_SESSION["saddress2"] = $uidExists["sAddress2"];
            $_SESSION["sasu"] = $uidExists["sASU"];
            $_SESSION["scountry"] = $uidExists["sCountry"];
            $_SESSION["scity"] = $uidExists["sCity"];
            $_SESSION["sstate"] = $uidExists["sState"];
            $_SESSION["spostcode"] = $uidExists["sPostcode"];
            $_SESSION["stelephone"] = $uidExists["sTelephone"];

            $_SESSION["bfirstname"] = $uidExists["bfirstname"];
            $_SESSION["blastname"] = $uidExists["bLastName"];
            $_SESSION["bcompany"] = $uidExists["bCompany"];
            $_SESSION["baddress1"] = $uidExists["bAddress1"];
            $_SESSION["baddress2"] = $uidExists["bAddress2"];
            $_SESSION["basu"] = $uidExists["bASU"];
            $_SESSION["bcountry"] = $uidExists["bCountry"];
            $_SESSION["bcity"] = $uidExists["bCity"];
            $_SESSION["bstate"] = $uidExists["bState"];
            $_SESSION["bpostcode"] = $uidExists["bPostcode"];

            $_SESSION["approval"] = "false";









            if($uidExists["userType"]=="user"){
                header("Location: ../cart.php");
            }
            else if($uidExists["userType"]=="admin"){
                header("Location: ../cart.php");
            }
            else{
                echo "no priviledges adquired";
            }
            //header("location: ../index.php");
            //exit();
                }
}