// var qtyHolders = document.querySelectorAll(".qty-holder");
var qtyDecs = document.querySelectorAll(".qty-dec");
var qtyIncs = document.querySelectorAll(".qty-inc");

qtyDecs.forEach((qtyDec) => {
  qtyDec.addEventListener("click",function(e){
    if(e.target.nextElementSibling.value > 1){
      e.target.nextElementSibling.value--;
    } else {
      // delete the item, etc
    }
  })
})
qtyIncs.forEach((qtyDec) => {
  qtyDec.addEventListener("click",function(e){
    e.target.previousElementSibling.value++;
  })
})



var qtyDecs2 = document.querySelectorAll(".card-dec");
var qtyIncs2 = document.querySelectorAll(".card-inc");

qtyDecs2.forEach((qtyDec2) => {
  qtyDec2.addEventListener("click",function(e){
    if(e.target.nextElementSibling.value > 1){
      e.target.nextElementSibling.value--;
    } else {
      // delete the item, etc
    }
  })
})
qtyIncs2.forEach((qtyDec2) => {
  qtyDec2.addEventListener("click",function(e){
    e.target.previousElementSibling.value++;
  })
})