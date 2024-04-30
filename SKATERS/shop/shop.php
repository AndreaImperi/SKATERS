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
    <div class="fixed-bar" style="margin-top: 0%;">
        <div style="display: flex; justify-content: center; align-items: center; height: 0vh; width: 96vw;background-color: white; margin-top: 1%;">
            <!-- <button>LOGO</button>  -->
            <img src="../immagini/logo.png" style="height: 80px; margin-top:1.2%;">
        </div>
        <h2 style="color: black; font-weight: 700;">Shop<div style="display: flex; justify-content: right; align-items: end; height: 0vh; width: 96vw;">
            <button id="Bcarrello" ></button>
        </div></h2>
        <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
    </div>

    <div class="grid">
        <div class="c1">
            <div style="margin-top: 10%;">
                <input type="search" placeholder="Cerca">
                <select name="categorie" id="select_categorie" size="1" cols="4">
                    <option value="nessuna">Categoria</option>
                    <option value="decks">Tavole</option>
                    <option value="ruote">Ruote</option>
                    <option value="trucks">Trucks</option>
                </select>
            </div>
            <!-- <div style="margin-bottom: 5%;text-align: left;">
                <hr class="linea" id="linea-grigia" style="color: darkgray;margin-top: 5%;">
            </div> -->
            <div style="margin-bottom: 5%;text-align: left; margin-top: 5%;">
                    <h3 id="etichetta_tavole" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Tavole</h3>
                    <h3 id="etichetta_ruote" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Ruote</h3>
                    <h3 id="etichetta_trucks" class="quicksand" style="margin-left: 2%; color: rgb(93, 83, 83); display: none;" >Trucks</h3>
                    <hr class="linea" id="linea-grigia" style="color: rgb(93, 83, 83) ;margin-top: 1%;">
            </div>
        </div>
        
        <!-- <div class="articolo">
            <div class="messaggio_login">!non hai effettuato il login!</div>
            <div class="immagine" align="center">
                <img class="default" src="../immagini/scarpa1.webp">
                <img class="sinistra" src="../immagini/scarpa2.webp">
                <img class="destra" src="../immagini/scarpa3.webp">
                
                <div class="barra">
                    <button class="Bacquista" style="margin-left: 1%; vertical-align: middle !important;">Acquista</button>
                    <label>Taglia:</label>
                    <select class="Taglia" id="select" style="margin-left: 1%;">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="nessuna" selected></option>
                    </select> 
                    
                </div>
                <div class="pallini">
                    <div class="sinistra"></div>
                    <div class="destra"></div>
                </div>
            </div>
                <div class="marca" style>Marca</div>
                <div class="nome">Nome dell'articolo</div>
                <div><span>€</span><span class="prezzo">99.99</span></div> 
        </div> -->

        <?php
        error_reporting(0);
        session_start();
        

        
        // echo "Benvenuto, $nome_utente!";
        $nome_utente = $_SESSION['email'];

        // Connessione al database
        $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

        // Query per selezionare tutti gli articoli dalla tabella articolo_shop
        $query = "SELECT * FROM articolo_shop";
        $result = pg_query($connessione, $query);

        // Verifica se ci sono risultati
        if ($result) {
            // Itera su ogni riga del risultato
            while ($row = pg_fetch_assoc($result)) {
                // Stampa l'HTML per ogni articolo

                
                if ($row['categoria']=='deck') {
                    echo '<div class="articolo deck">';
                } else if ($row['categoria']=='ruota') {
                    echo '<div class="articolo ruota">';
                } if ($row['categoria']=='truck') {
                    echo '<div class="articolo truck">';
                }

                echo '<div class="messaggio_login">!non hai effettuato il login!</div>';
                echo '<div class="immagine" align="center">';
                echo '<img class="default" src="' . $row['img_d'] . '">';
                echo '<img class="sinistra" src="' . $row['img_sx'] . '">';
                echo '<img class="destra" src="' . $row['img_dx'] . '">';
                echo '<div class="barra">';
                echo '<button class="btn btn-outline-light quicksand Bacquista" style="margin-left: 1%; vertical-align: middle !important;">Acquista</button>';
                echo '<label>Taglia:</label>';

                if ($row['categoria']=='deck') {
                    echo '<select class="Taglia" style="margin-left: 1%;border-radius: 5px;">';
                    echo '<option value="8.0">8.0</option>';
                    echo '<option value="8.25">8.25</option>';
                    echo '<option value="8.375">8.375</option>';
                    echo '<option value="8.5">8.5</option>';
                } else if ($row['categoria']=='ruota') {
                    echo '<select class="Taglia" style="margin-left: 1%;border-radius: 5px;">';
                    echo '<option value="52mm">52mm</option>';
                    echo '<option value="54mm">54mm</option>';
                    echo '<option value="58mm">58mm</option>';
                    echo '<option value="60mm">60mm</option>';
                } if ($row['categoria']=='truck') {
                    echo '<select class="Taglia" style="margin-left: 1%;border-radius: 5px;">';
                    echo '<option value="146">146</option>';
                    echo '<option value="147">147</option>';
                    echo '<option value="149">149</option>';
                    echo '<option value="151">151</option>';
                }

                echo '<option value="nessuna" selected></option>';
                echo '</select>'; 
                echo '</div>';
                echo '<div class="pallini">';
                echo '<div class="sinistra"></div>';
                echo '<div class="destra"></div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="marca">' . $row['marca'] . '</div>';
                echo '<div class="nome">' . $row['nome'] . '</div>';
                echo '<div><span>€</span><span class="prezzo">' . $row['prezzo'] . '</span></div>';
                echo '</div>';
            }
        } else {
            echo "Nessun articolo trovato.";
        }

        ?>


    </div>

    <div class="carrelloSopra" id="carrelloSopra">
        <div class="carrelloDentro" id="carrelloDentro">
            <!-- Contenuto del carrello -->
            <h2 class="titolo_carrello" style="align-self: flex-start; margin-bottom: 5%;">Il Tuo Carrello</h2>
            
            <!-- <div class="articoloCarrello">
                <img src="../immagini/scarpa1.webp">
                
                <div class="dettagli" style="display: flex; flex-direction: column;">
                    <div class="nome">Nome dell'articolo</div>
                    <div class="taglia">Taglia: M</div>
                    <div><span>€</span><span class="prezzo">99.99</span></div>
                    <button class="Brimuovi-articolo">.</button>
                </div>
            </div> -->

            <?php
            error_reporting(0);
            if ($_SESSION['email']!=null){
                // Query per selezionare tutti gli articoli dalla tabella articolo_shop
                $nome_utente = $_SESSION['email'];
                $query = "SELECT * FROM articolo_carrello WHERE email = $1";
                $result = pg_query_params($connessione, $query, array($nome_utente));

                // Verifica se ci sono risultati
                if ($result) {
                    // Itera su ogni riga del risultato
                    while ($row = pg_fetch_assoc($result)) {
                        // Stampa l'HTML per ogni articolo
                        echo '<div class="articoloCarrello">';
                        echo '<img src="' . $row['img'] . '">';
                            
                        echo '<div class="dettagli" style="display: flex; flex-direction: column;">';
                        echo '<div class="nome">' . $row['nome'] . '</div>';
                        echo '<div class="taglia">Taglia: ' . $row['taglia'] . '</div>';
                        echo '<div><span>€</span><span class="prezzo">' . $row['prezzo'] . '</span></div>';
                        echo '<button class="Brimuovi-articolo">.</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "il carrello è vuoto";
                }
            }
            

            ?>

            <div id="termine_carrello" style="align-self: flex-start;">
            <?php
            if (isset($_SESSION['email'])){
                $query = "SELECT SUM(prezzo::numeric) as totale_prezzo FROM articolo_carrello WHERE email=$1";
                $result = pg_query_params($connessione, $query, array($nome_utente));
                if ($result) {
                    $row = pg_fetch_assoc($result);
                    if ($row['totale_prezzo']!='') {
                        echo '<p>Totale: <span id="totale">' . $row['totale_prezzo'] . '</span> Euro</p>';
                    } else {
                        echo '<p>Totale: <span id="totale">0</span> Euro</p>';
                    }
                }
            }else{
                echo '<p>Totale: <span id="totale">0</span> Euro</p>';
            }
                
            ?>
                <button class="Bsvuota_carrello">Svuota Carrello</button>
                <button id="Bchiudi-carrello">Chiudi Carrello</button>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
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
</body>
</html>
