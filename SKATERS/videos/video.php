<!DOCTYPE html>
<html>
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
    <div class="fixed-bar" style="margin-top: 0%;">
        <div style="display: flex; justify-content: center; align-items: center; height: 0vh; width: 96vw;background-color: white; margin-top: 1%;">
            <!-- <button>LOGO</button>  -->
            <a href="../index.php" style="margin-top:1.1%;">
                <img src="../immagini/logo.png" style="height: 80px; margin-top:1.2%;">
            </a>
        </div>
        <h2 style="color: black; font-weight: 700;">Videos</h2>
        <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
    </div>
    <div class="grid">
        <div class="c1">
        <div style="margin-top: 10%;">
                <input type="text" placeholder="Cerca" id="barra" style="border: 2px solid black; border-radius:5px; width: 200px">
                <img id="searchInput" src='../immagini/lenteIngrandimento.png' class="lente" style="width: 50px;margin-bottom:0.3%; cursor: pointer"></img>
                <select name="categorie" id="select_categorie" size="1" cols="4" style="margin-left: 50%; border: 2px solid black;border-radius:5px">
                    <option value="nessuna">Categoria</option>
                    <option value="tutorial">Tutorial</option>
                    <option value="part">Video Part</option>
                    <option value="sls">Competizioni</option>
                </select>
            </div>
            
            <div style="margin-bottom: 5%;text-align: left; margin-top: 5%;">
                    <h3 id="etichetta_tutorial" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Tutorial</h3>
                    <h3 id="etichetta_part" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Video Part</h3>
                    <h3 id="etichetta_sls" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Competizioni</h3>
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
            
    <div  style="display: flex; align-items: center; justify-content: space-between; background-color: #181818; height: 100px;overflow: hidden;margin-top: 5%;bottom:0%;">
            <div align="left" style="margin-left:1%;">
                
                <input class="quicksand" type="text" placeholder="Facci una domanda" size="22" style="margin-bottom: 7%; border-radius: 5px;">
                <h1 class="quicksand" style=" text-align: left; font-size: small; color: rgb(255, 255, 255); ">
                    CONTATTACI: skaters@gmail.com
                </h1>
            </div>
           
            <!-- <button style="text-align: center;">LOGO</button> -->
            <img src="../immagini/logo.png" style="height: 80%;">

            <div style="margin-right:1%">
                <h1 class="quicksand" style=" text-align: right; font-size: small; color: rgb(255, 255, 255);">CREATORI:</h1>
                <h1 class="quicksand" style=" text-align: left; font-size: small; color: rgb(255, 255, 255);">Imperi Andrea e Dario Finocchiaro</h1>
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
                var etichetta_tutorial = document.getElementById("etichetta_tutorial");
                var etichetta_part = document.getElementById("etichetta_part");
                var etichetta_sls = document.getElementById("etichetta_sls");

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

                    etichetta_tutorial.style.display = 'none';
                    etichetta_part.style.display = 'none';
                    etichetta_sls.style.display = 'none';
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

                    etichetta_tutorial.style.display = 'block';
                    etichetta_part.style.display = 'none';
                    etichetta_sls.style.display = 'none';
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

                    etichetta_tutorial.style.display = 'none';
                    etichetta_part.style.display = 'block';
                    etichetta_sls.style.display = 'none';
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

                    etichetta_tutorial.style.display = 'none';
                    etichetta_part.style.display = 'none';
                    etichetta_sls.style.display = 'block';
                } 
            }); 
        });
        document.addEventListener('DOMContentLoaded', function() {
        var searchButton = document.getElementById("searchInput"); 
        searchButton.addEventListener("click", function() { 
                var ricerca = document.getElementById('barra');
                var valore = ricerca.value.toLowerCase(); // Converto il valore della ricerca in minuscolo per fare una ricerca case-insensitive
                var videoContainers = document.querySelectorAll(".video"); // Seleziono tutti gli elementi con la classe "video"
                // Itero su tutti i contenitori dei video
                videoContainers.forEach(function(videoContainer) {
                    var titoloVideo = videoContainer.querySelector(".titolo").textContent.toLowerCase(); // Ottengo il testo del titolo del video e lo converto in minuscolo
                    if (titoloVideo.includes(valore)) { // Controllo se il titolo del video contiene la stringa di ricerca
                        videoContainer.style.display = "block"; // Mostro il contenitore del video
                    } else {
                        videoContainer.style.display = "none"; // Nascondo il contenitore del video se non corrisponde alla ricerca
                    }
            });
        });
    });
        


  

    </script>
  
</body>
</html>