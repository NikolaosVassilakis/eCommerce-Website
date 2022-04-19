<?php
function addOrder($conn, $uID, $oFirstName, $oLastName, $oAddress1, $oAddress2, $oCompany, $oASU, $oCountry, $oCity, $oState, $oPostcode, $oTelephone, $oProducts, $oPrice, $oDate, $paymentID, $orderID, $paymentType, $uEmail){

    $query="INSERT INTO orders (users_id, oFirstName, oLastName, oAddress1, oAddress2, oCompany, oASU, oCountry, oCity, oState, oPostcode, oTelephone, oProducts, oPrice, oDate, payment_id, order_id, payment_type, order_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    // 16
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'SQL order error';

    } else {
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssss",$uID, $oFirstName, $oLastName, $oAddress1, $oAddress2, $oCompany, $oASU, $oCountry, $oCity, $oState, $oPostcode, $oTelephone, $oProducts, $oPrice, $oDate, $paymentID, $orderID, $paymentType, $uEmail);
        mysqli_stmt_execute($stmt);
        unset($_SESSION['cart']);
        header("Location: ../index.php?message=success");

    }

}

?>