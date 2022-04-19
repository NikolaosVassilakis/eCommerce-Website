<?php 
session_start();
include 'action.php';

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

if(isset($_POST)){
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
if(!in_array($_POST['c_id'], $session_array_id)){
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

// START OF THE OUTPUT
$output = "";
$output .= "

<div class='spacemaker'></div>
<main class='cart-container'>
        
<h1 class='cart-heading'>
    <i class='fa-solid fa-cart-shopping'></i> Shopping Cart
</h1>

<div class='item-flex'>

    <section class='checkout'>

        <h2 class='section-heading'>Payment Details</h2>

        <div class='payment-form'>

            <div class='payment-method'>

                <button class='method selected'>
                    <i class='fa-solid fa-credit-card'></i>

                    <span>Credit Card</span>

                    <i id='checkmark' class='fa-solid fa-circle-check'></i>
                </button>

                <button class='method'>
                    <i class='fa-brands fa-paypal'></i>

                    <span>PayPal</span>

                    <i id='checkmark' class='fa-regular fa-circle-check'></i>
                </button>

            </div>

            <form action='#'>

                <div class='cardholder-name'>
                    <label for='cardholder-name' class='label-default'>Cardholder name</label>
                    <input type='text' name='cardholder-name' id='cardholder-name' class='input-default'>
                </div>

                <div class='card-number'>
                    <label for='card-number' class='label-default'>Card number</label>
                    <input type='number' name='card-number' id='card-number' class='input-default'>
                </div>

                <div class='input-flex'>

                    <div class='expire-date'>
                        <label for='expire-date' class='label-default'>Expiration date</label>

                        <div class='input-flex'>

                            <input type='number' name='month' id='expire-date' placeholder='12' min='1' max='12'
                                class='input-default'>
                            /
                            <input type='number' name='year' id='expire-date' placeholder='25' min='1' max='99'
                                class='input-default'>

                        </div>
                    </div>

                    <div class='cvv'>
                        <label for='cvv' class='label-default'>CVV</label>
                        <input type='number' name='cvv' id='cvv'class='input-default'>
                    </div>

                </div>
                <div class='payment-content'>
                    <button class='payment-btn'>
                        <b>CONFIRM PAYMENT</b>
                    </button>
                </div>
            </form>

        </div>

    </section>

    <!-- 
      <form name='submitform' method='post' action=''>

  -->
    <section class='cart'>
     
      
    
    

        <div class='cart-item-box'>

            <h2 class='section-heading'>Order Summery</h2>
            <form name='submitform' method='post' action=''>

";


if(!empty($_SESSION['cart'])){

  foreach($_SESSION['cart'] as $key => $value) {

    // PART OF THE OUTPUT
    $output .= "


    <div class='product-card'>

    <div class='card'>

        <div class='img-box'>
            <img src='".$value['photo']."' alt='img' width='80px' class='product-img'>
        </div>

        <div class='detail'>

            <h4 class='product-name'>".$value['name']."</h4>

            <input type='hidden' name='ke[]' value=".$key.">


            <div class='wrapper'>

                <div class='product-qty'>
                    <button type='submit' name='update-qty' id='submitf' class='qty-dec'>
                        <i class='fa-solid fa-minus'></i>
                    </button>

                    <input onchange='myQuantity()' name='aaa[]' type='number' class='input-qty'
                        value=".$value['quantity']." readonly>

                    <button type='submit' name='update-qty' id='submitf' class='qty-inc'>
                        <i class='fa-solid fa-plus'></i> </button>
                </div>

                <div class='price'>
                    <span id='price'>$ ".$value['price']."</span>
                </div>

            </div>

        </div>

        <a class='product-close-a' href='index.php?action=remove&id=".$value['id']."'>
            <button type='button' class='product-close-btn'>
            
                <i class='fa-solid fa-circle-xmark'></i>
            </button>
        </a>
        
        </div>
        
      </div>

    ";

    $subtotal = $subtotal + $value['quantity'] * $value['price'];
    $qtotal = $qtotal + $value['quantity'];


  } 

$taxtotal = ($tax / 100) * $subtotal;
$total = $taxtotal + $shipping;

  // PART OF THE OUTPUT
  $output .="
</form>

  </div>

  <div class='amount-wrapper'>

      <div class='amount'>

          <div class='subtotal'>
              <span>Subtotal</span> <span>$ <span id='subtotal'>".number_format($subtotal,2)."</span></span>
          </div>
          
          <div class='tax'>
              <span>Tax</span> <span>$ <span id='tax'>".number_format($taxtotal,2)."</span></span>
          </div>

          <div class='shipping'>
              <span>Shipping</span> <span>$ <span id='shipping'>".number_format($shipping,2)."</span></span>
          </div>

          <div class='total'>
              <span>Total</span> <span>$ <span id='total'>".number_format($total,2)."</span></span>
          </div>

        </div>

      </div>     
    
    
  </section>
  <!-- 
  </form>
  -->
  

  
</div>

</main>

";
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
       header("Location: ../cart.php");
       exit;
     }
   }
 }
}



?>