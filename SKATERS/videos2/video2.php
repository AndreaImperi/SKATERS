<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Collegamento bootstrap -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Collegamento foglio di stile -->
        <link rel="stylesheet" href="style.css">
        <!-- Per i fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body class="quicksand">
    <!-- Inizializzazione sessione per utilizzare $_SESSION -->
    <?php session_start(); ?>
    <!-- Barra Superiore con Logo -->
    <div class="fixed-bar iphone">
        <div class="toppa iphone">
            <a href="../index.php" style="margin-top:1.1%;">
                <img src="../immagini/logo.png" class="logo iphone">
            </a>
        </div>
        <h2 class="videos_scritta"style="color: black; font-weight: 700;">Videos</h2>
        <hr class="sotto_scritta" style="border-color: #333; border-width: 3px; opacity: 1;">
    </div>
    
    <!-- Utilizzo grid per il corpo della pagina (3 o 2 colonne in base alla dimensione) -->
    <div class="grid">

        <!-- Riga della grid contenente la barra di ricerca e la select con le categorie -->
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
            <!-- Etichetta che compare in base alla categoria selezionata -->
            <div style="margin-bottom: 5%;text-align: left; margin-top: 5%;">
                    <h3 id="etichetta_videos" style="margin-left: 2%; color: rgb(93, 83, 83); display: block;" ></h3> 
                    <hr class="linea" id="linea-grigia" style="color: rgb(93, 83, 83) ;margin-top: 1%;">
            </div>
        </div>

        <!-- Elementi della grid contenenti video che vengono caricati dinamicamente dal database  -->
        <?php
            $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

            $query = "SELECT * FROM video";
            $result = pg_query($connessione, $query);

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    if ($row['categoria']=='tutorial') {
                        echo '<a class="video  tutorial" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    } else if ($row['categoria']=='part') {
                        echo '<a class="video  part" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    } if ($row['categoria']=='sls') {
                        echo '<a class="video  sls" style="color: white;" href="'. $row['link'] .'" target="_blank">';
                    }
                    echo '<img class="copertina" src="'. $row['img'] .'">';
                    echo '<h2 class="titolo">'. $row['nome'] .'</h2>';
                    echo '</a>';
                }
            } else {
                echo "Nessun video trovato.";
            }
        ?>
    </div>

    <!-- Avviso che compare nel caso non ci siano video corrispondenti alla ricerca -->
    <h2 class="novideo" id="novideo" style="display: none; margin-top: 5%; color: rgb(93, 83, 83)">Non ci sono video disponibili :(</h2>
    
    <!-- div per la barra finale-->
    <div class="finale iphone" id="finale">
            <div align="left" style="margin-left:1%;">
                <h1 class="cont " style=" text-align: left; font-size: small; color: rgb(255, 255, 255); ">
                    CONTATTACI: skaters@gmail.com
                </h1>
            </div>
           
            <img src="../immagini/logo.png" class="logob iphone">

            <div style="margin-right:1%">
                <h1 class="creator " style=" text-align: right; font-size: small; color: rgb(255, 255, 255);">CREATORI:</h1>
                <h1 class="names " style=" text-align: right; font-size: small; color: rgb(255, 255, 255);"> Finocchiaro Dario Imperi Andrea  </h1>
            </div>
    </div>

    <!-- Collegamento al file JavaScrip -->
    <script src="script.js"></script>
</body>
</html>
