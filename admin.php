

<?php 
// include_once 'header.php';
session_start();
include 'includes/action.php';

if(isset($_SESSION["userid"])) {

  if($_SESSION["usertype"] !== "admin"){
    header("Location: index.php?message=no-entres-a-donde-no-te-importa");   
  } else {
    include 'fill/admin.fill.php';
  }
} else {
  header("Location: index.php?message=no-tienes-derecho-a-este-accesso");   

}
?>
