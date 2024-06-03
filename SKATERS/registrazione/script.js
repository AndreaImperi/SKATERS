// Per la rotazione delle ruote in base allo scroll della pagina
window.addEventListener('scroll', function() {
    var posizione_scroll = window.scrollY;

    var angolo_rotazione = posizione_scroll * 0.5; 

    var immaginedu = document.querySelector('.immaginedxU');
    var immagineds = document.querySelector('.immaginedxD');
    var immaginesu = document.querySelector('.immaginesxU');
    var immaginesd = document.querySelector('.immaginesxD');

    immaginedu.style.transform = 'rotate(' + angolo_rotazione + 'deg)';
    immagineds.style.transform = 'rotate(' + angolo_rotazione + 'deg)';
    immaginesu.style.transform = 'rotate(' + angolo_rotazione + 'deg)';
    immaginesd.style.transform = 'rotate(' + angolo_rotazione + 'deg)';
});

// Funzione per il controllo tra password e conferma password
var password = document.getElementById("psw");
var c_password = document.getElementById("cpsw");
var password_e = document.getElementById("epsw");
var registrati = document.getElementById("registrati");
function controllaPassword(){
    if (password.value != c_password.value){
        password_e.innerHTML = "!Le Password non corrispondono!";
        registrati.disabled = true;
    return false;
    }
    else{
        password_e.innerHTML = "";
        registrati.disabled = false;
        return true;
    }
}
c_password.onkeyup = controllaPassword;

// Funzione per il "mostra password"
document.addEventListener('DOMContentLoaded', function () {
    var passwordV = document.getElementById('psw');
    var passwordN = document.getElementById('cpsw');
    var mostra =document.getElementById('mostra'); 
    mostra.addEventListener('change', function(){
        if (mostra.checked){
            passwordV.type = 'text';
            passwordN.type = 'text';
        }else{
            passwordV.type = 'password';
            passwordN.type = 'password';
        }
    })
});
