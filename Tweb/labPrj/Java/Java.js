window.onload = function() {  
   $("big-link-1").onclick = login;
   $("big-link-2").onclick = signup;
 // var password = document.getElementById("password");
  //var confirmpassword = document.getElementById("confirm_password"); 
   
 
};

function login() {
 $('page-title').style.float= "right" ;
  var form= document.createElement('form');
  form.method="post";
  form.action="loginconf.php";
 $('frame').insert(form);
var title=document.createElement('h1');
 title.textContent=" Access your personal page";
 form.insert(title);
var br= document.createElement('br');
var username= document.createElement('input');
  username.type = "text";
  username.name="u";
  username.required="required";
  username.placeholder="Username";
  form.insert(username);
  form.insert(br);
var br= document.createElement('br');
var password= document.createElement('input');
  password.type="password" ;
  password.name="p";
  password.placeholder="Password";
  password.required="required";
  form.insert(password);
  form.insert(br);  
var button=document.createElement('button');
  button.type="submit";
  button.textContent="Login";
  form.insert(button);
  $("big-link-1").style.visibility = "hidden";
  $("big-link-2").style.visibility = "hidden";
}

function signup (){
  $('page-title').style.float= "left" ;
var form= document.createElement('form');
   form.method="post";
   form.action="SignUp.php";
   $('frame').insert(form);
var title=document.createElement('h1');
 title.textContent=" Subscribe your activity";
 form.insert(title);
 
var br= document.createElement('br');
var email= document.createElement('input');
  email.type = "email";
  email.name="e";
  email.required="required";
  email.placeholder="Email Adress";
  form.insert(email);
  form.insert(br);
var br= document.createElement('br');
var password= document.createElement('input');
  password.type="password" ;
  password.name="p";
  password.id="password";
  password.placeholder="Password";
  password.required="required";
  form.insert(password);
  form.insert(br);
var br= document.createElement('br');
var confirmpassword= document.createElement('input');
  confirmpassword.type="password" ;
  confirmpassword.name="cp";
  confirmpassword.id="confirm_password";
  confirmpassword.placeholder="Confirm Password";
  confirmpassword.required="required";
  form.insert(confirmpassword);
  form.insert(br);
var button=document.createElement('button');
  button.type="submit";
  button.textContent="Sign Up";
  form.insert(button);
 
 $("big-link-1").style.visibility = "hidden";
 $("big-link-2").style.visibility = "hidden";   
 
  password.onchange = validatePassword(password,confirmpassword);
  confirmpassword.onkeyup = validatePassword(password,confirmpassword);
}

function validatePassword(password,confirmpassword){
  if(password.value !== confirmpassword.value) {
    confirmpassword.setCustomValidity("Passwords Don't Match");
  } else {
    confirmpassword.setCustomValidity('');
  }
}
 
 