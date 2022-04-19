function resetClass(element, classname){
    element.classList.remove(classname);
  }



  document.getElementsByClassName("show-signup")[0].addEventListener("click",function(){
    let form = document.getElementsByClassName("form")[0];
    resetClass(form, "signin");
    resetClass(form, "reset");
    form.classList.add("signup");
    document.getElementById("submit-btn").innerText = "Register";
    document.getElementById("submit-btn").name = "submit";
    document.getElementsByName("logsignform")[0].action=("includes/signup.inc.php");

    document.getElementsByName("firstname")[0].required=true;    
    document.getElementsByName("lastname")[0].required=true;
    document.getElementsByName("email")[0].required=true;
    document.getElementsByName("pwd")[0].required=true;
    document.getElementsByName("pwdrepeat")[0].required=true;
  });



  document.getElementsByClassName("show-signin")[0].addEventListener("click",function(){
    let form = document.getElementsByClassName("form")[0];
    resetClass(form, "signup");
    resetClass(form, "reset");
    form.classList.add("signin");
    document.getElementById("submit-btn").innerText = "Sign In";
    document.getElementById("submit-btn").name = "submit";
    document.getElementsByName("logsignform")[0].action=("includes/login.inc.php");

    document.getElementsByName("firstname")[0].required=false;
    document.getElementsByName("lastname")[0].required=false;
    document.getElementsByName("email")[0].required=true;
    document.getElementsByName("pwd")[0].required=true;
    document.getElementsByName("pwdrepeat")[0].required=false;
  });



  document.getElementsByClassName("show-reset")[0].addEventListener("click",function(){
    let form = document.getElementsByClassName("form")[0];
    resetClass(form, "signup");
    resetClass(form, "signin");
    form.classList.add("reset");
    document.getElementById("submit-btn").innerText = "Reset Password";
    document.getElementById("submit-btn").name = "reset-request-submit";
    document.getElementsByName("logsignform")[0].action=("includes/reset-request.inc.php");

    document.getElementsByName("firstname")[0].required=false;
    document.getElementsByName("lastname")[0].required=false;
    document.getElementsByName("email")[0].required=true;
    document.getElementsByName("pwd")[0].required=false;
    document.getElementsByName("pwdrepeat")[0].required=false;
  });