<?php
include "header.php";
// Set a same-site cookie for first-party contexts
// setcookie('cookie1', 'value1', ['samesite' => 'Lax']);
// Set a cross-site cookie for third-party contexts
// setcookie('cookie2', 'value2', ['samesite' => 'None', 'secure' => true]);
require 'vendor/autoload.php';
MercadoPago\SDK::setAccessToken('TEST-6186541385264288-040319-040265a4e10e3f12d0967141be2a9336-179564182');





if(!empty($_SESSION["cart"])){

} else {
    header("Location: index.php");
}
?>

<div class="spacemaker"></div>
<main class="cart-container">

    <h1 class="cart-heading">
        <i class="fa-solid fa-cart-shopping"></i> Shopping Cart
    </h1>

    <div class="item-flex">

    <?php
    if(isset($_SESSION['userid'])){
        if(isset($_GET['status'])){
            if($_GET['status'] == 's-success'){
                if($_SESSION['approval'] == "true"){
                    include 'fill/cart.payment.fill.php';
                } else {
                    include 'fill/cart.ship.fill.php';
                }
            } else {
                include 'fill/cart.ship.fill.php';
            }
        } else {
            include 'fill/cart.ship.fill.php';
        }
       
    } else {
        include 'fill/cart.login.fill.php';
    }
    ?>

        <section class="cart">

        



            <div class="cart-item-box">

                <h2 class="section-heading"><i class="fa-solid fa-clipboard"></i> Order Summary</h2>
                <form name="submitform" method="post" action="">

                    <?php
                        if(!empty($_SESSION["cart"])){
                            $qtotal = 0;
                            
                            foreach($_SESSION["cart"] as $key => $value) 
                            {
                    ?>
                    <div class="product-card">

                        <div class="card">

                            <div class="img-box">
                                <img src="<?=$value["photo"]?>" alt="img" width="80px" height="100px"
                                class="product-img">
                            </div>

                            <div class="detail">

                                <h4 class="product-name" id="c-c-h">
                                    <?=$value["name"]?>
                                </h4>

                                <input type="hidden" name="ke[]" value="<?=$key?>">


                                <div class="wrapper">

                                    <div class="product-qty">
                                        <button type="submit" name="update-qty" id="submitf" class="qty-dec">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>

                                        <input onchange="myQuantity()" name="aaa[]" type="number" class="input-qty"
                                            value="<?=$value["quantity"]?>" readonly>

                                        <button type="submit" name="update-qty" id="submitf" class="qty-inc">
                                            <i class="fa-solid fa-plus"></i> </button>
                                    </div>

                                    <div class="price">
                                        <span id="price"><span class="pesos">$ </span>
                                            <?=number_format($value["price"],2)?>
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <a class="product-close-a" href="index.php?action=remove&id=<?=$value["id"]?>">
                                <button type="button" class="product-close-btn">

                                    <i class="fa-solid fa-circle-xmark"></i>
                                </button>
                            </a>

                        </div>

                    </div>

                    <?php
                        $subtotal = $subtotal + $value["quantity"] * $value["price"];
                        $qtotal = $qtotal + $value["quantity"];
                        }
                        $taxtotal = ($tax / 100) * $subtotal;
                        $total = $subtotal + $taxtotal + $shipping;
                    ?>

                </form>

            </div>

            <div class="amount-wrapper">

                <div class="amount">

                    <div class="subtotal">
                        <span>Subtotal</span> <span><span class="pesos">$ </span> <span id="subtotal">
                                <?=number_format($subtotal,2)?>
                            </span></span>
                    </div>

                    <div class="tax">
                        <span>Tax</span> <span><span class="pesos">$ </span> <span id="tax">
                                <?=number_format($taxtotal,2)?>
                            </span></span>
                    </div>

                    <div class="shipping">
                        <span>Shipping</span> <span><span class="pesos">$ </span> <span id="shipping">
                                <?=number_format($shipping,2)?>
                            </span></span>
                    </div>

                    <div class="total">
                        <span>Total</span> <span><span class="pesos">$ </span> <span id="total">
                                <?=number_format($total,2)?>
                            </span></span>
                    </div>

                </div>

            </div>


        </section>




    </div>

</main>

<?php
}
?>

<?php
$preference = new MercadoPago\Preference();

$preference->payment_methods = array(
    "installments" => 1
);

$item = new MercadoPago\Item();
$item->id = 'NoSeID1';
$item->title = 'Price Total';
$item->quantity = 1;
$item->unit_price = $total;
$item->curreyncy_id = "MXN";

$preference->items = array($item);

$preference->back_urls = array(
    // CAMBIAR CUANDO SE SUBA EN LINEA
    "success" => "http://localhost/Maria%20Fernanda/includes/payment.inc.php?message=success&totalP=$total",
    "failure" => "http://localhost/Maria%20Fernanda/index.php?message=fail"

);

$preference->auto_return = "approved";
$preference->binary_mode = true;


$preference->save();
?>

<!-- MERCADO PAGO  -->
<script>
    const mp = new MercadoPago('TEST-1e158426-fa50-4cba-a126-be1b73298697', {
        locale: 'es-MX'
    });

    mp.checkout({
        preference: {
            id: '<?php echo $preference->id;?>'
        },
        render: {
            container: '#MercadoPago',
            label: 'Pay with Mercado Pago'
        }
    });


</script>


<?php


include "footer.php";
?>