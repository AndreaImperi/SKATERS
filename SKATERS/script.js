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
// Collegamento alla pagina Shop tramite scritta
document.getElementById("Tshop").addEventListener("click", function() {
    window.location.href = "shop/shop.php"
});

// Per far alternare le mappe
document.addEventListener('DOMContentLoaded', function () {
    var sel_park = document.getElementById('btnradio1');
    var sel_tutto = document.getElementById('btnradio2');
    var sel_shop = document.getElementById('btnradio3');
    var mappa_park = document.getElementById('skatepark');
    var mappa_shop = document.getElementById('skateshop');
    var mappa_tutto = document.getElementById('tutto');
    sel_park.addEventListener('change', function () {
        if (sel_park.checked) {
            mappa_park.style.display = 'block';
            mappa_shop.style.display = 'none';
            mappa_tutto.style.display = 'none';
        }
    });
    sel_shop.addEventListener('change', function () {
        if (sel_shop.checked) {
            mappa_shop.style.display = 'block';
            mappa_park.style.display = 'none';
            mappa_tutto.style.display = 'none';
        }
    });
    sel_tutto.addEventListener('change', function(){
        if (sel_tutto.checked){
            mappa_tutto.style.display = 'block';
            mappa_park.style.display = 'none';
            mappa_shop.style.display = 'none';
        }
    })

    // Per far apparire e scomparire immagine e nome utente
    document.getElementById("bprofilo").onclick = function() {
        if (document.getElementById("profilo").style.display == "none") {
            document.getElementById("profilo").style.display = "block";
        } else {
            document.getElementById("profilo").style.display = "none";
        }
    }

    // Per far apparire e scomparire il div Facci una Domanda
    document.getElementById("Bemail").onclick = function() {
        if (document.getElementById("email").style.display == "none") {
            document.getElementById("email").style.display = "block";
            document.getElementById("overlay").style.filter = "blur(5px)";
        } else {
            document.getElementById("email").style.display = "none";
            document.getElementById("overlay").style.filter = "none";
        }
    }

    // Per chiudere il layer overlay quando l'utente clicca al di fuori dell'area dell'input email o del pulsante "Facci una domanda".
    document.getElementById("overlay").onclick = function(event) {
        if (event.target.id !== "email" && event.target.id !== "Bemail") {
            document.getElementById("email").style.display = "none";
            document.getElementById("overlay").style.filter = "none";
        }
    }

    // Per chiudere il div email e togliere l'overlay
    document.getElementById("xchiusura").onclick = function(){
        document.getElementById("email").style.display = "none";
        document.getElementById("overlay").style.filter = "none";
    }




});

// Per chiudere Alert
document.getElementById("ok").onclick = function(){
    document.getElementById("alert").style.display = "none";
}

// Per far chiudere dopo 4 secondi l'alert in automatico
var div = document.getElementById("alert");
setTimeout(() => {
    div.style.display = "none";
}, 4000);

// Per gestire il logout da pulsante
document.getElementById("logout").addEventListener("click", function() {
    // Eseguo una richiesta POST al file logout.php usando JQuery, la funzione di callback rimanda alla pagina principale
    $.post("logout.php", {}, function(data) {
        window.location.href = "index.php";
    });
});


//Per controllare il numero massimo di caratteri 
function MaxCaratteri() {
    var messaggio = document.getElementById("messaggio").value;
    var massimo = 1000;
    
    if (messaggio.length > massimo) {
        alert("Troppi caratteri!");
    }
}
//Per controllare il numero minimo di caratteri 
function MinCaratteri(event) {
    var messaggio = document.getElementById("messaggio").value;

    if (messaggio.length === 0) {
        alert("Il messaggio è vuoto!");
        event.preventDefault(); 
    }
}