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
    var posizione = cellaM.getBoundingClientRect().top - 50;

    window.scrollTo({
        top: posizione,
        behavior: "smooth"
    });
});

document.getElementById("Baccedi").addEventListener("click", function() {
    window.location.href = "accesso/accesso.html";
});

document.getElementById("Bshop").addEventListener("click", function() {
    window.location.href = "shop/shop2.html";
});
document.getElementById("sfondo").addEventListener("mouseenter", function(){
    var bottone = document.getElementById("Bshop");
    
    document.querySelectorAll('.btn-check').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var selectedMap = this.getAttribute('data-src');
            document.getElementById('map-iframe').setAttribute('src', selectedMap);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const map1 = document.getElementById('skateshop');
        const map2 = document.getElementById('skatepark');
        const btnradio1 = document.getElementById('btnradio1');
        const btnradio2 = document.getElementById('btnradio2');
    
        btnradio1.addEventListener('click', function() {
            map1.style.zIndex = '1';
            map2.style.zIndex = '0';
        });
    
        btnradio2.addEventListener('click', function() {
            map1.style.zIndex = '0';
            map2.style.zIndex = '1';
        });
    });



});