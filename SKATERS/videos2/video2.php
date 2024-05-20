<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body class="quicksand">
    <?php session_start(); ?>
    <div class="fixed-bar iphone">
        <div class="toppa iphone">
            <!-- <button>LOGO</button>  -->
            <a href="../index.php" style="margin-top:1.1%;">
                <img src="../immagini/logo.png" class="logo iphone">
            </a>
        </div>
        <h2 class="videos_scritta"style="color: black; font-weight: 700;">Videos</h2>
        <hr class="sotto_scritta" style="border-color: #333; border-width: 3px; opacity: 1;">
    </div>

    <div class="grid">
        <div class="c1 iphone">
            <div style="margin-top: 10%;">
            <select name="categorie" id="select_categorie" class="select_categorie" size="1" cols="4" style=" border: 2px solid black;border-radius:5px; height:30px">
                    <option value="nessuna">Categoria</option>
                    <option value="tutorial">Tutorial</option>
                    <option value="part">Video Part</option>
                    <option value="sls">Competizioni</option>
                </select>
                <input type="text" placeholder="Cerca" id="barra" style="border: 2px solid black; border-radius:5px; width: 200px;margin-left:0.5%">
                <img id="searchInput" src='../immagini/lenteIngrandimento.png' class="lente" style="width: 50px;margin-bottom:0.3%; cursor: pointer;"></img>
            </div>
            <div style="margin-bottom: 5%;text-align: left; margin-top: 5%;">
                    <h3 id="etichetta_videos" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: block;" ></h3> 
                    <hr class="linea" id="linea-grigia" style="color: rgb(93, 83, 83) ;margin-top: 1%;">
            </div>
        </div>

        <?php
            $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

            $query = "SELECT * FROM video";
            $result = pg_query($connessione, $query);

            // Verifica se ci sono risultati
            if ($result) {
                // Itera su ogni riga del risultato
                while ($row = pg_fetch_assoc($result)) {
                    if ($row['categoria']=='tutorial') {
                        echo '<a class="video quicksand tutorial" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    } else if ($row['categoria']=='part') {
                        echo '<a class="video quicksand part" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    } if ($row['categoria']=='sls') {
                        echo '<a class="video quicksand sls" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    }
                    echo '<img class="copertina" src="'. $row['img'] .'">';
                    echo '<h2 class="titolo" id="black">'. $row['nome'] .'</h2>';
                    echo '</a>';
                }
            } else {
                echo "Nessun video trovato.";
            }
            ?>
    </div>
    <h2 class="novideo" id="novideo" style="display: none; margin-top: 5%; color: rgb(93, 83, 83)">Non ci sono video disponibili :(</h2>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <div class="finale iphone" id="finale">
            <div align="left" style="margin-left:1%;">
                
                
                <h1 class="cont quicksand" style=" text-align: left; font-size: small; color: rgb(255, 255, 255); ">
                    CONTATTACI: skaters@gmail.com
                </h1>
            </div>
           
            <!-- <button style="text-align: center;">LOGO</button> -->
            <img src="../immagini/logo.png" class="logob iphone">

            <div style="margin-right:1%">
                <h1 class="creator quicksand" style=" text-align: right; font-size: small; color: rgb(255, 255, 255);">CREATORI:</h1>
                <h1 class="names quicksand" style=" text-align: right; font-size: small; color: rgb(255, 255, 255);"> Finocchiaro Dario Imperi Andrea  </h1>
            </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
        var searchButton = document.getElementById("searchInput"); 
        searchButton.addEventListener("click", function() { 
                var ricerca = document.getElementById('barra');
                var valore = ricerca.value.toLowerCase(); // Converto il valore della ricerca in minuscolo per fare una ricerca case-insensitive
                var videoContainers = document.querySelectorAll(".video"); // Seleziono tutti gli elementi con la classe "video"
                // Itero su tutti i contenitori dei video
                var barra = document.getElementById('finale');
                var novideo =document.getElementById('novideo');
                var min = 0;
                videoContainers.forEach(function(videoContainer) {
                    var titoloVideo = videoContainer.querySelector(".titolo").textContent.toLowerCase(); // Ottengo il testo del titolo del video e lo converto in minuscolo
                    if (titoloVideo.includes(valore)) { // Controllo se il titolo del video contiene la stringa di ricerca
                        videoContainer.style.display = "block"; // Mostro il contenitore del video
                        min = 1;
                    } else {
                        videoContainer.style.display = "none"; // Nascondo il contenitore del video se non corrisponde alla ricerca
                           //min = 0;
                    }
                });
            if (valore === '') min = 1;
            if (min === 0){
                novideo.style.display = "block";
                barra.style.position = "fixed";
                barra.style.bottom = "0%";
                barra.style.width = "100%";
                console.log("il min è 0 -> block");
            }else{
                //barra.style.position = "static";
                barra.style.position = "absolute";
                barra.style.bottom = "0%";
                barra.style.width = "100%";
                novideo.style.display = "none";
                console.log("il min è 1 -> none");
            }
        });
        document.getElementById("Bemail").onclick = function() {
            if (document.getElementById("email").style.display == "none") {
                document.getElementById("email").style.display = "block";
            } else {
                document.getElementById("email").style.display = "none";
            }
        }


        document.getElementById("xchiusura").onclick = function(){
            document.getElementById("email").style.display = "none";
        }
    });
        

  

    </script>
</body>
</html>
