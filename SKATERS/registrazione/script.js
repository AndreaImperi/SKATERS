window.addEventListener('scroll', function() {
    // Ottieni la posizione verticale dello scrolling della pagina
    var scrollPosition = window.scrollY;

    // Calcola l'angolo di rotazione in base alla posizione dello scrolling
    var rotationAngle = scrollPosition * 0.5; // Modifica il fattore 0.5 per regolare la velocità di rotazione

    // Seleziona tutte le immagini con le classi 'immaginedx' e 'immaginesx'
   var immagined = document.querySelector('.immaginedxU');
    var immagineds = document.querySelector('.immaginedxD');
    var immaginesu = document.querySelector('.immaginesxU');
    var immaginesd = document.querySelector('.immaginesxD');


    // Applica la rotazione a ciascuna immagine utilizzando CSS
    immagined.style.transform = 'rotate(' + rotationAngle + 'deg)';
    immagineds.style.transform = 'rotate(' + rotationAngle + 'deg)';
    immaginesu.style.transform = 'rotate(' + rotationAngle + 'deg)';
    immaginesd.style.transform = 'rotate(' + rotationAngle + 'deg)';

});

    //Controllo tra password e conferma password
    //Password
    var password = document.getElementById("psw");
    // Conferma password
    var c_password = document.getElementById("cpsw");
    // Errore password
    var password_e = document.getElementById("epsw");
    var registrati = document.getElementById("registrati");
    function validatePassword(){
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
    // Evento utilizzato per chiamare la funzione validatePassword() ogni volta che l'utente rilascia una "chiave", (appena viene inserito un carattere da tastiera), all'interno dell'elemento c_password
    c_password.onkeyup = validatePassword;

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