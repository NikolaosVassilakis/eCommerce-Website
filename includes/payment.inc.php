<?php
session_start();
require_once 'dbh.inc.php';
require_once 'payment.function.inc.php';


// POST SAVE ORDER SE QUITARA Y SERA AUTOMATICO
// if (isset($_POST["Save-Order"])) {
    $cList = "";
    $cPrice = "";

    if(isset($_SESSION["cart"])){

        if(isset($_SESSION["userid"])){

            // AQUI EMPIEZA TODO EL PROCESO
            if(!empty($_SESSION["cart"])){
                foreach($_SESSION["cart"] as $key => $value) {
                    $cList .= $value["name"] . "(" . $value["quantity"] . ")" . ",";
                }

                

                date_default_timezone_set('America/Mexico_City');
                $uID = $_SESSION["userid"];
                $oFirstName = $_SESSION["sfirstname"];
                $oLastName = $_SESSION["slastname"];
                $oAddress1 = $_SESSION["saddress1"];
                $oAddress2 = $_SESSION["saddress2"];
                $oCompany = $_SESSION["scompany"];
                $oASU = $_SESSION["sasu"];
                $oCountry = $_SESSION["scountry"];
                $oCity = $_SESSION["scity"];
                $oState = $_SESSION["sstate"];
                $oPostcode = $_SESSION["spostcode"];
                $oTelephone = $_SESSION["stelephone"];

                $oProducts = $cList;
                $oPrice = $_GET['totalP'];
                $oDate = date('d/m/y H:i:s');
                $paymentID = $_GET['payment_id'];
                $orderID = $_GET['merchant_order_id'];
                $paymentType = $_GET['payment_type'];

                $uEmail = $_SESSION["useremail"];


                addOrder($conn, $uID, $oFirstName, $oLastName, $oAddress1, $oAddress2, $oCompany, $oASU, $oCountry, $oCity, $oState, $oPostcode, $oTelephone, $oProducts, $oPrice, $oDate, $paymentID, $orderID, $paymentType, $uEmail);




                // AQUI TERMINA EL PROCESO
            } else {
                header("Location: ../cart.php?message=cartisempty");
            }
            
            
            } else {
                header("Location: ../cart.php?message=nohaycuenta");
            }

    } else {
        header("Location: ../cart.php?message=nohaycarro");
        exit();
    }
// PARTE DE LO QUE SE TENDRA QUE QUITAR
// } else{
//     header("location: ../cart.php?errormessage=falloaqui");
//     exit();
// }








?>