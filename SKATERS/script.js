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