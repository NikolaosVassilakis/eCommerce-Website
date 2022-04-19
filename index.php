<?php
include 'header.php';
?>


<div class="spacemaker"></div>
        <div class = "main-container">
                <img class="category-logo" src="img/MFLogo.png" alt="">
            <h2>THE PERFECT MATCH</h2>
            <p>JEWELRY & ACCESSORIES</p>

            <?php

            if(isset($_GET["message"])){
              if(isset($_GET["message"]) == "success"){
                echo '<p class="finish"><i class="fa-regular fa-heart"></i> ORDER HAS BEEN SUCCESSFUL. THANK YOU FOR SHOPPING WITH US <i class="fa-regular fa-heart"></i></p>';
              }
              else if(isset($_GET["message"]) == "fail"){
                echo '<p class="finish"><i class="fa-regular fa-face-sad-tear"></i> ORDER  HAS FAILED. PLEASE TRY AGAIN OR LET US KNOW BY CONTACTING US <i class="fa-regular fa-face-sad-tear"></i></p>';
              }

            }

            ?>
            

            <div class = "filter-container">
                
                <!-- CONTIENE LA BARRA DE FILTROS -->

                <div class = "category-head">
                    <ul>
                        <div class="category-title cat-active" id="all">
                            <li>Todo</li>
                        </div>
                        <div class="category-title" id="accesorios">
                            <li>Accesorios para el cabello</li>
                        </div>
                        <div class="category-title" id="anillos">
                            <li>Anillos</li>
                        </div>
                        <div class="category-title" id="aretes">
                            <li>Aretes</li>
                        </div>
                        <div class="category-title" id="collares">
                            <li>Collares</li>
                        </div>
                        <div class = "category-title" id = "pearcings">
                            <li>Pearcings</li>
                        </div>
                        <div class="category-title" id="pulseras">
                            <li>Pulseras</li>
                        </div>
                        <div class="category-title" id="tobilleras">
                            <li>Tobilleras</li>
                        </div>
                    </ul>
                </div>



<!-- CONTIENE LOS PRODUCTOS -->


                    <div class="grid-card">
                    <!-- AQUI EMPIEZAN LOS PRODUCTOS  -->

<?php while($row=$result->fetch_assoc()){ 
  ?>
  


  <div class="all <?= $row['category']; ?> card-wrapper">
    <form method="post" id="myForm" onsubmit="return ajaxgo('<?=$row['id'] ?>','<?= $row['name']; ?>','<?= $row['price']; ?>','<?= $row['photo']; ?>','1');">
      <div class="grid-half">

        <div class="left-half">
          <div class="card-img">
          <img src="<?= $row['photo']; ?>">
          </div>
        </div>

        <div class="right-half">
          <div class="card-info">

            <div class="card-text">
              <h1 id="c-t-h"><?= $row['name']; ?></h1>
              <h2 id="c-s-h">by Fernanda Torrescano</h2>
              <p id="c-d-p"><?= $row['detail']; ?></p>
            </div>

            <div class="card-price"><p><span class="pesos">$</span><span class="precio"><?= $row['price']; ?></span></p></div>
            <div class="card-btn">
            <button name="add-cart" id="add-animation" onclick="stayThere(); increaseCart();">AGREGAR</button>
            </div>

          </div>
        </div>

      </div>
      <input type="hidden" name="c_quantity" value="1" min="1" max="1">
      <input type="hidden" name="c_id" value="<?= $row['id']; ?>">
      <input type="hidden" name="c_name" value="<?= $row['name']; ?>">
      <input type="hidden" name="c_price" value="<?= $row['price']; ?>">
      <input type="hidden" name="c_photo" value="<?= $row['photo']; ?>">
    </form>
    </div>







<?php } 
?>
</div>



</div>
</div>






        <script>
// ESTA MADRE ROMPE FORM RESUBMITION
  if(window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  
// CADA QUE CAMBIA EL VALOR HAZ CLICK
function myQuantity(){
   document.getElementById('submitf').click();

}

// FORM SUBMIT 
function stayThere(){
window.localStorage.setItem('stay', 'Yes');
}

// AFTER PAGE LOADS 
window.onload = function() {
  setTimeout(function(){
  window.localStorage.setItem('stay', 'No');
  },500);
}

// if (window.localStorage.getItem('stay') == "Yes"){

document.addEventListener("DOMContentLoaded", function(event) { 

  if (window.localStorage.getItem('stay') == "Yes"){

            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        }});

        window.onbeforeunload = function(e) {
          if (window.localStorage.getItem('stay') == "Yes"){

            localStorage.setItem('scrollpos', window.scrollY);
        }};

</script>




<?php
include 'footer.php';
?>