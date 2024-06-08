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
        <h2 class="shop"style="color: black; font-weight: 700;">Shop</h2>
        <div style="display: flex; justify-content: right; align-items: end; height: 0vh; width: 96vw;">
            <button class="Bcarrello iphone" id="Bcarrello" ></button>
        </div>
        <hr class="sotto_scritta" style="border-color: #333; border-width: 3px; opacity: 1;">
    </div>

    <!-- Utilizzo grid per il corpo della pagina (4,3 o 2 colonne in base alla dimensione) -->
    <div class="grid">

        <!-- Riga della grid contenente la barra di ricerca e la select con le categorie -->
        <div class="c1 iphone">
            <div style="margin-top: 10%;">
            <select name="categorie" id="select_categorie" size="1" cols="4" style=" border: 2px solid black;border-radius:5px; height:30px">
                    <option value="nessuna">Categoria</option>
                    <option value="decks">Tavole</option>
                    <option value="ruote">Ruote</option>
                    <option value="trucks">Trucks</option>
                </select>
                <input type="text" placeholder="Cerca" id="barra" style="border: 2px solid black; border-radius:5px; width: 200px;margin-left:0.5%">
                <img id="searchInput" src='../immagini/lenteIngrandimento.png' class="lente" style="width: 50px;margin-bottom:0.3%; cursor: pointer;"></img>
            </div>
            <div style="margin-bottom: 5%;text-align: left; margin-top: 5%;">
                    <h3 id="etichetta_shop" style="margin-left: 2%; color: rgb(93, 83, 83); display: block;" ></h3> 
                    <hr class="linea" id="linea-grigia" style="color: rgb(93, 83, 83) ;margin-top: 1%;">
            </div>
        </div>
        
        <!-- Elementi della grid contenenti articoli che vengono caricati dinamicamente dal database  -->
        <?php
        error_reporting(0);
        $nome_utente = $_SESSION['email']; 
        $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());
        $query = "SELECT * FROM articolo_shop";
        $result = pg_query($connessione, $query);
        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
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
                echo '<button class="btn btn-outline-light Bacquista">Acquista</button>';
                echo '<label class="taglia_label">Taglia:</label>';

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

    <!-- Avviso che compare nel caso non ci siano video corrispondenti alla ricerca -->
    <h2 class="noart" id="noart" style="display: none; color: rgb(93, 83, 83)">Non ci sono articoli disponibili :(</h2>

    <!-- Per il carrello  -->
    <div class="carrelloSopra" id="carrelloSopra">
        <div class="carrelloDentro iphone" id="carrelloDentro">
            <h2 class="titolo_carrello" style="align-self: flex-start; margin-bottom: 5%;">Il Tuo Carrello</h2>
            
            <!-- Articoli del carrello caricati dinamicamente dal database  -->
            <?php
                error_reporting(0);
                $display_avviso="block";
                $var_click = 'disabled';
                if ($_SESSION['email']!=null){
                    $var_click = '';
                    $display_avviso="none";
                    $nome_utente = $_SESSION['email'];
                    $query = "SELECT * FROM articolo_carrello WHERE email = $1";
                    $result = pg_query_params($connessione, $query, array($nome_utente));
                    if ($result) {
                        while ($row = pg_fetch_assoc($result)) {
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

            <!-- Avviso in caso di login non effettuato -->
            <h1 class="avviso_cart" style=" align-self: center; font-size: medium; color: #808080; text-align: center; display: <?php echo $display_avviso; ?>;">esegui il login per visualizzare il tuo carrello</h1>

            <div id="termine_carrello" style="align-self: flex-start;">
                <!-- Totale di costo del carrello calcolato dinamicamente -->
                <?php
                if (isset($_SESSION['email'])){
                    $query = "SELECT SUM(prezzo::numeric) as totale_prezzo FROM articolo_carrello WHERE email=$1";
                    $result = pg_query_params($connessione, $query, array($nome_utente));
                    if ($result) {
                        $row = pg_fetch_assoc($result);
                        if ($row['totale_prezzo']!='') {
                            echo '<p>Totale: <span id="totale">' . $row['totale_prezzo'] . '</span> Euro</p>';
                        }else {
                            echo '<p>Totale: <span id="totale">0</span> Euro</p>';
                        }
                    }
                }else{
                    echo '<p>Totale: <span id="totale">0</span> Euro</p>';
                }                   
                ?>
                <button <?php echo $var_click;?>  class="Bsvuota_carrello btn btn-outline-primary ">Svuota Carrello</button>


                <!-- Alert per svuotare il carrello -->
                <div class="alert modal-dialog " role="document" id="alert" style="display:none; padding:20px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title h5 " id="modal1Title">Svuota carrello</h2>
                        </div>
                        <div class="modal-body">
                            <p>Sei sicuro di voler svuotare il carrello?</p>
                        </div>
                        <div class="modal-footer" style="display: flex; justify-content: right; gap: 10px;">
                            <button id="svuota_conferma" class=" btn btn-outline-danger btn-sm " style="margin-top:5%">SVUOTA</button>
                            <button id="annulla_svuotamento" class=" btn btn-outline-primary btn-sm " style="margin-top:5%">ANNULLA</button>
                        </div>
                    </div>
                </div>


                
                <button id="Bchiudi-carrello" class="btn btn-outline-primary ">Chiudi Carrello</button>
            </div>
        </div>
    </div>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
