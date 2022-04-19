<?php
include 'header.php';

if(isset($_SESSION["userid"])){
    include 'fill/account.fill.php';    
} else {
   header("Location: login.php");
}

include 'footer.php';
?>