<?php 
session_start();
include 'includes/action.php';

$shipping = 132;
$tax = 16;
$taxtotal = 0;
$total = 0;
$subtotal = 0;
$qtotal = 0;

$query="SELECT * FROM crud";
$stmt=$conn->prepare($query);
$stmt->execute();
$result=$stmt->get_result();



// PART THAT CREATES CART ARRAY FROM SESSION

if(isset($_POST["add-cart"])){
// YA ESTA CREADO EL CART
if(isset($_SESSION['cart'])){
$session_array_id = array_column($_SESSION['cart'],"id");

// CART ESTA VACIO PERO EXISTE
if(empty($session_array_id)){
$session_array = array(
  "id" => $_POST['c_id'],
  "name" => $_POST['c_name'],
  "price" => $_POST['c_price'],
  // AQUI HUBO CAMBIO PARA PHOTO
  "quantity" => $_POST['c_quantity'],
  "photo" => $_POST['c_photo']
  
    );
    $_SESSION['cart'][] = $session_array;
}

//CART EXISTE Y NO ESTA VACIO
else {


  //PRODUCTO NO EXISTE EN CART
  if(!in_array($_GET['id'], $session_array_id)){
    $session_array = array(
      "id" => $_POST['c_id'],
      "name" => $_POST['c_name'],
      "price" => $_POST['c_price'],
      // AQUI HUBO CAMBIO PARA PHOTO
      "quantity" => $_POST['c_quantity'],
      "photo" => $_POST['c_photo']


      
        );
        $_SESSION['cart'][] = $session_array;
  
  }

  //PRODUCTO EXISTE EN CART
  else{
    foreach($_SESSION['cart'] as $key => $value){

      if($value['id'] == $_POST['c_id']){
        $sum_q = $value['quantity'] + $_POST['c_quantity'];
        $_SESSION['cart'][$key]['quantity'] = $sum_q;
      }
    }
    }
}
}

//CART NO EXISTE
else{
  $session_array = array(
"id" => $_POST['c_id'],
"name" => $_POST['c_name'],
"price" => $_POST['c_price'],
// AQUI HUBO CAMBIO PARA PHOTO
"quantity" => $_POST['c_quantity'],
"photo" => $_POST['c_photo']


  );
  $_SESSION['cart'][] = $session_array;
}

}

if(isset($_POST['update-qty'])){

    foreach($_SESSION['cart'] as $key => $value) {

     for ($i = 0; $i < count($_POST['ke']); $i++) {
       $aaa = $_POST['aaa'][$i];
       $key_var = $_POST['ke'][$i];

       // setting the session spesific session array value different for each key  
       $_SESSION['cart'][$key_var]['quantity'] = $aaa;
   }
 }
 
 header("Location: cart.php");
 exit;
}

if(!empty($_SESSION["cart"])){
  
  foreach($_SESSION["cart"] as $key => $value) {
    $qtotal = $qtotal + $value["quantity"];
  }

}


if(isset($_GET['action'])){

 if($_GET['action'] == "clearall"){

   unset($_SESSION['cart']);
   header("Location: cart.php");
   exit;
 }

 if($_GET['action'] == "remove"){
   foreach($_SESSION['cart'] as $key => $value){

     if($value['id'] == $_GET['id']){
      
       unset($_SESSION['cart'][$key]);

       if(empty($_SESSION['cart'])){
         header("Location: index.php");
       } else {
         header("Location: cart.php");
        }
       exit;
     }
     
   }
 }
}



?>

<!-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
AQUI EMPIEZA LA PAGINA PRINCIPAL DESPUES DEL PHP
------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- LOCAL STYLESHEET -->
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

  <!-- ICONS GENERATOR -->
  <script src="https://kit.fontawesome.com/d7cc1a20f8.js" crossorigin="anonymous"></script>

  
  <script src="javascript/textFit.js"></script>



  <script src="javascript/header.js" defer></script>

  <!-- MERCADO PAGO -->
  <script src="https://sdk.mercadopago.com/js/v2"></script>


<script>
  function ajaxgo(id, name, price, photo, quantity){
// GET FROM DATA 
var data = new FormData();
data.append("c_id", id);
data.append("c_name", name);
data.append("c_price", price);
data.append("c_photo", photo);
data.append("c_quantity", quantity);


// AJAX 
var xhr = new XMLHttpRequest();
xhr.open("POST", "includes/submit.inc.php");
xhr.onload = function(){  

};
xhr.send(data);

// PREVENT HTML FROM SUBMIT 
return false;


}
</script>
</head>



<body>
  <!-- this ends at footer -->
  <div class="container">
    <!-- this ends at footer -->

    <nav id="navbar-id" class="navbar">
      <div class="logo">
        <a href="index.php">
          <img src="img/CropMFLogo.png" width="50px" alt="">
        </a>
      </div>
      <button class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
      <div class="navbar-links">
        <ul>
          <li><a href="index.php">Home</a></li>

            <?php
                    if (isset($_SESSION["userid"])){
                        
                        if($_SESSION["usertype"]=="admin"){
                            echo "<li><a href='admin.php'>Products</a></li>";
                            echo "<li><a href='orders.php'>Orders</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                        }
                            else {
                                echo "<li><a href='orders.php'>Orders</a></li>";
                                echo "<li><a href='account.php'>Profile</a></li>";
                                echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                            } 
                    }
                    else {
                        echo"<li><a href='login.php'>Log in/Register</a></li>";
                       
                    }
            ?>

          <li><a href="#contact_footer">Contact</a></li>


          <!-- CART ICON -->
          <li>
            <button id="cnt" class="cartbtn" onclick="cartFunction()">
              <div class="cart-container-icon">
                <div class="counter-container">
                  <span id="counter">
                    <?php
                    echo $qtotal
                    ?>
                  </span>
                  <i class="fas fa-shopping-cart"></i>
                </div>
              </div>
            </button>
          </li>
          <!-- CART ICON -->



        </ul>
      </div>
    </nav>