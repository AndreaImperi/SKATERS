document.getElementById("Bvideo").addEventListener("click", function() {
    apriPaginaVideo("videos/video.html")
});

document.getElementById("Tvideo").addEventListener("click", function() {
    apriPaginaVideo("videos/video.html")
});

function apriPaginaVideo(url) {
    window.location.href = url;
}

document.getElementById("Bmappe").addEventListener("click", function() {
    var cellaM = document.getElementById("cellaMappe");
    var posizione = cellaM.offsetTop - 50;

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
    });
    document.addEventListener("DOMContentLoaded", function() {
        var b = document.getElementById("bruota");
        var corpo = document.getElementById("corpo");
        var profilo = document.getElementById("profilo");
        var closed = document.getElementById("closed");

        function primoPinao(){
            corpo.style.filter = 'blur(5px)';
            profilo.style.display = 'block';
        }
        function secondoPiano(){
            corpo.style.filter = 'blur(0px)';
            profilo.style.display = 'none';
        }

        bruota.addEventListener("click", primoPinao);
        closed.addEventListener("click", secondoPiano);



    });
 