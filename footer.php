<footer id="contact_footer" class="footer">
    <div class="f_container">
        <div class="f_row">
            <div class="f_col lf">
                <div class="fholder">
                <h4>Contact Us</h4></div>
                <ul>
                    <li><a href="#">Contact Form</a></li>
                    <li>e: empresacontacto@gmail.com</li>
                    <li>t: +53 833 295 4839</li>
                </ul>
            </div>

            <div class="f_col rf">
            <div class="fholder">
                <h4>follow us</h4>
            </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

</footer>

</div> <!-- this is from header-->

<!-- CATEGORY FILTER SCRIPT  -->
<script src = "javascript/filter.cat.js"></script>

<!-- STOP CONSTANT RESUBMITION SCRIPT / SUBMIT FORM ON QUANTITY INPUT CHANGE SCRIPT  -->
<script>


  if(window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }


function myQuantity(){
//    document.getElementById('submitf').click();
   document.getElementByClassName('update-qty').click();
}


</script>






<!-- CART SCRIPT  -->
<script src="javascript/cart.js"></script>
<!-- QUANTITY INPUT SCRIPT  -->
<script src="javascript/qty-inp.js"></script>
<!-- INCRESE BASKET WITHOUT RELOAD PAGE  -->
<script>
var span = document.getElementById("counter");
let cnt = parseInt(span.textContent);
function increaseCart(){
cnt = cnt + 1;
span.textContent = cnt;
span.style.display = "flex";
}
</script>
<!-- FIT TEXT SIZE INSIDE CONTENT -->
<script>
    textFit(document.querySelectorAll("#c-d-p"), {minFontSize:1, maxFontSize:11});
    textFit(document.querySelectorAll("#c-t-h"), {minFontSize:1, maxFontSize:25}, {widthOnly:true});
    textFit(document.querySelectorAll("#p-t-h"), {minFontSize:1, maxFontSize:25}, {widthOnly:true});
    textFit(document.querySelectorAll("#c-c-h"), {minFontSize:1, maxFontSize:18}, {widthOnly:true});
</script>
<!-- CART ICON IF STATEMENT -->
<script>
    function cartFunction(){
        counter = document.getElementById("counter").textContent;
        if(counter == 0){
            console.log("no products in basket");
        } else {
            window.location.href='cart.php'
        }
    }
</script>


</body>

</html>