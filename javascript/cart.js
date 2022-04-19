var counter = document.getElementById("counter").innerHTML;
if(counter == 0){
    document.getElementById("counter").style.display = "none";
}
else{
    document.getElementById("counter").style.display = "flex";}
console.log(counter);