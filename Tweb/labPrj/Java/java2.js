window.onload = function() {
    
var password = document.getElementById("password");
var email = document.getElementById("mail");

    if ((email.value==="")||(password.value==="")) {
        window.location.href = 'index.html';
    }
        
};

