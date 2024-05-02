document.getElementById("Bvideo").addEventListener("click", function() {
    apriPaginaVideo("videos/video.php")
});

document.getElementById("Tvideo").addEventListener("click", function() {
    apriPaginaVideo("videos/video.php")
});

function apriPaginaVideo(url) {
    window.location.href = url;
}

document.getElementById("Bmappe").addEventListener("click", function() {
    var cellaM = document.getElementById("cellaMappe");
    var posizione = cellaM.offsetTop - 70;

    window.scrollTo({
        top: posizione,
        behavior: "smooth"
    });
});

document.getElementById("Baccedi").addEventListener("click", function() {
    window.location.href = "accesso/accesso.php";
});

document.getElementById("Bshop").addEventListener("click", function() {
    window.location.href = "shop/shop.php";
});

document.getElementById("Bshop2").addEventListener("click", function() {
    window.location.href = "shop/shop.php";
});

document.getElementById("sfondo").addEventListener("mouseenter", function(){
    var bottone = document.getElementById("Bshop");
});
    
    document.querySelectorAll('.btn-check').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var selectedMap = this.getAttribute('data-src');
            document.getElementById('map-iframe').setAttribute('src', selectedMap);
        });
    });

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


        document.getElementById("bruota").onclick = function() {
            if (document.getElementById("profilo").style.display == "none") {
                document.getElementById("profilo").style.display = "block";
            } else {
                document.getElementById("profilo").style.display = "none";
            }
        }


        // document.getElementById("logout").onclick = function() {
        //     $.post("logout.php", {}, function(data) {
        //         // Se la richiesta è riuscita, reindirizza l'utente alla pagina di accesso
        //         if (data.errore) {
        //             console.log('errore non so cosa');
        //         } else {
        //             console.log('Inserimento avvenuto con successo');
        //         }
        //         //window.location.href = "index.php";
        //     });
        // }
        
    });

    document.getElementById("logout").addEventListener("click", function() {
        $.post("logout.php", {}, function(data) {
            window.location.href = "index.php";
        });
    });
    

    

        



        // $.post("inserimento.php", { nome: nome, img: immagine, taglia: taglia, prezzo: prezzo, email: email}, function(data) {
        //     console.log(data);
        //     if (data.errore) {
        //         console.log(data.errore);
        //     } else {
        //         console.log('Inserimento avvenuto con successo');
        //     }
        // });