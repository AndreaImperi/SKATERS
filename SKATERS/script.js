// Collegamento alla pagina Video tramite bottone
document.getElementById("Bvideo").addEventListener("click", function() {
    window.location.href = "videos2/video2.php"
});
// Collegamento alla pagina Video tramite scritta
document.getElementById("Tvideo").addEventListener("click", function() {
    window.location.href = "videos2/video2.php"
});

// Scroll pagina fino a sezione mappe
document.getElementById("Bmappe").addEventListener("click", function() {
    var cellaM = document.getElementById("cellaMappe");
    var posizione = cellaM.offsetTop - 70;

    // Utilizzo il metodo scrollTo dell'oggetto window, (radice di tutto il BOM e DOM)
    window.scrollTo({
        top: posizione,
        behavior: "smooth"
    });
});

// Collegamento alla pagina Accesso tramite bottone
document.getElementById("Baccedi").addEventListener("click", function() {
    window.location.href = "accesso/accesso.php";
});

// Collegamento alla pagina Shop tramite bottone
document.getElementById("Bshop").addEventListener("click", function() {
    window.location.href = "shop/shop.php";
});

// Collegamento alla pagina Shop tramite bottone
document.getElementById("Bshop2").addEventListener("click", function() {
    window.location.href = "shop/shop.php";
});

// Funzione per far alternare le mappe
document.addEventListener('DOMContentLoaded', function () {
    var skateparkRadio = document.getElementById('btnradio1');
    var tutto = document.getElementById('btnradio2');
    var skateshopRadio = document.getElementById('btnradio3');
    var skateparkFrame = document.getElementById('skatepark');
    var skateshopFrame = document.getElementById('skateshop');
    var tuttoM = document.getElementById('tutto');
    skateparkRadio.addEventListener('change', function () {
        if (skateparkRadio.checked) {
            skateparkFrame.style.display = 'block';
            skateshopFrame.style.display = 'none';
            tuttoM.style.display = 'none';
        }
    });
    skateshopRadio.addEventListener('change', function () {
        if (skateshopRadio.checked) {
            skateshopFrame.style.display = 'block';
            skateparkFrame.style.display = 'none';
            tuttoM.style.display = 'none';
        }
    });
    tutto.addEventListener('change', function(){
        if (tutto.checked){
            tuttoM.style.display = 'block';
            skateparkFrame.style.display = 'none';
            skateshopFrame.style.display = 'none';
        }
    })

    // Funzione per far apparire e scomparire immagine e nome utente
    document.getElementById("bprofilo").onclick = function() {
        if (document.getElementById("profilo").style.display == "none") {
            document.getElementById("profilo").style.display = "block";
        } else {
            document.getElementById("profilo").style.display = "none";
        }
    }

    // Funzione per far apparire e scomparire il div Facci una Domanda
    document.getElementById("Bemail").onclick = function() {
        if (document.getElementById("email").style.display == "none") {
            document.getElementById("email").style.display = "block";
            document.getElementById("overlay").style.filter = "blur(5px)";
        } else {
            document.getElementById("email").style.display = "none";
            document.getElementById("overlay").style.filter = "none";
        }
    }

    // Funzione per chiudere il layer overlay quando l'utente clicca al di fuori dell'area dell'input email o del pulsante "Facci una domanda".
    document.getElementById("overlay").onclick = function(event) {
        if (event.target.id !== "email" && event.target.id !== "Bemail") {
            document.getElementById("email").style.display = "none";
            document.getElementById("overlay").style.filter = "none";
        }
    }

    // Funzione per chiudere il div email e togliere l'overlay
    document.getElementById("xchiusura").onclick = function(){
        document.getElementById("email").style.display = "none";
        document.getElementById("overlay").style.filter = "none";
    }

    function resetForm() {
        var form = document.getElementById("formemail");
        form.reset();
    }
});

// Funzione per chiudere Alert messaggio
document.getElementById("ok").onclick = function(){
    document.getElementById("alert").style.display = "none";
    
}

// Funzione per far chiudere dopo 4 secondi l'alert in automatico
var div = document.getElementById("alert");
setTimeout(() => {
    div.style.display = "none";
}, 4000);


document.getElementById("logout").addEventListener("click", function() {
    $.post("logout.php", {}, function(data) {
        window.location.href = "index.php";
    });
});