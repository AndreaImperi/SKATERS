document.addEventListener('DOMContentLoaded', function() {
    // Per la gestione delle scritte delle categorie
    var selectCategorie = document.getElementById("select_categorie");
    selectCategorie.addEventListener("change", function() {
        var valoreSelezionato = selectCategorie.value;
        var elementi_tutorial = document.querySelectorAll(".tutorial");
        var elementi_part = document.querySelectorAll(".part");
        var elementi_sls = document.querySelectorAll(".sls");
        var etichetta_videos = document.getElementById("etichetta_videos");

        if (valoreSelezionato=="nessuna") {
            for (var i = 0; i < elementi_tutorial.length; i++) {
                elementi_tutorial[i].style.display = "block";
            }
            for (var j = 0; j < elementi_part.length; j++) {
                elementi_part[j].style.display = "block";
            }
            for (var h = 0; h < elementi_sls.length; h++) {
                elementi_sls[h].style.display = "block";
            }

            etichetta_videos.innerText = "";
        } else if (valoreSelezionato=="tutorial") {
            for (var i = 0; i < elementi_tutorial.length; i++) {
                elementi_tutorial[i].style.display = "block";
            }
            for (var j = 0; j < elementi_part.length; j++) {
                elementi_part[j].style.display = "none";
            }
            for (var h = 0; h < elementi_sls.length; h++) {
                elementi_sls[h].style.display = "none";
            }

            etichetta_videos.innerText = "Tutorial";
        } else if (valoreSelezionato=="part") {
            for (var i = 0; i < elementi_tutorial.length; i++) {
                elementi_tutorial[i].style.display = "none";
            }
            for (var j = 0; j < elementi_part.length; j++) {
                elementi_part[j].style.display = "block";
            }
            for (var h = 0; h < elementi_sls.length; h++) {
                elementi_sls[h].style.display = "none";
            }

            etichetta_videos.innerText = "Video Part";
        } else if (valoreSelezionato=="sls") {
            for (var i = 0; i < elementi_tutorial.length; i++) {
                elementi_tutorial[i].style.display = "none";
            }
            for (var j = 0; j < elementi_part.length; j++) {
                elementi_part[j].style.display = "none";
            }
            for (var h = 0; h < elementi_sls.length; h++) {
                elementi_sls[h].style.display = "block";
            }

            etichetta_videos.innerText = "Competizioni";
        }
        aggiusta_barra(); 
    });

    // Per la ricerca dei video 
    var searchButton = document.getElementById("searchInput"); 
    searchButton.addEventListener("click", function() { 
        var valoreSelezionato = selectCategorie.value;
        if (valoreSelezionato=="nessuna") {
            var videoContainers = document.querySelectorAll(".video");
        } else if (valoreSelezionato=="sls") {
            var videoContainers = document.querySelectorAll(".sls");
        } else if (valoreSelezionato=="part") {
            var videoContainers =  document.querySelectorAll(".part");
        } else if (valoreSelezionato=="tutorial") {
            var videoContainers = document.querySelectorAll(".tutorial");
        } 

        var ricerca = document.getElementById('barra');
        var valore = ricerca.value.toLowerCase();
        videoContainers.forEach(function(videoContainer) {
            var titoloVideo = videoContainer.querySelector(".titolo").textContent.toLowerCase();
            if (titoloVideo.includes(valore)) {
                videoContainer.style.display = "block";
            } else {
                videoContainer.style.display = "none"; 
            }
        });
        aggiusta_barra();
    });

    // Funzione per la gestione della barra finale in base ai video presenti
    function aggiusta_barra() {
        var videoContainers = document.querySelectorAll(".video");
        var barra = document.getElementById('finale');
        var novideo =document.getElementById('novideo');
        var larghezza_pagina = document.documentElement.clientWidth;
        var num = 0;

        for (const videoC of videoContainers) {
            if (videoC.style.display === "block") {
                num += 1;
            }
        }

        if (num === 0){
            novideo.style.display = "block";
            barra.style.position = "fixed";
            barra.style.bottom = "0%";
            barra.style.width = "100%";
        }else{
            if (larghezza_pagina<450){
                n_vid_m = 7;
            } else if (larghezza_pagina<1030){
                n_vid_m = 13;
            } else {
                n_vid_m = 0;
            }
            if (num >= n_vid_m) {
                barra.style.position = "static";
            } else {
                barra.style.position = "absolute";
            }
            barra.style.bottom = "0%";
            barra.style.width = "100%";
            novideo.style.display = "none";
        }
    }
});