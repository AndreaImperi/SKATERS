
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Collegamento bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
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
<body>
    <!-- Div per controllo sfocatura -->
    <div id="overlay">
        <!-- Inizializzazione sessione per utilizzare $_SESSION -->
        <?php 
            session_start();
            error_reporting(0);

            $timeout_duration = 1200;

            if (isset($_SESSION['email']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
                unset($_SESSION['email']);
            }

            // Per nome sotto immagine profilo
            $nomeUtente = $_SESSION['nome'];
        ?> 
        
        <!-- Barra Superiore con Logo e pulsanti per le altre pagine -->
        <div class="fixed-bar adjusted" style="align-items: center; justify-content:right;">
            <img class="logo iphone" src="immagini/logo.png">
            <!-- Utilizzo Flexbox per i pulsanti per le altre pagine -->
            <div style="display: flex; justify-content: right; align-items: end; margin-right:2%;">
                <button class="Bfix iphone btn btn-outline-light quicksand btn1" id="Bvideo" >VIDEOS</button>
                <button class="Bfix iphone btn btn-outline-light quicksand btn1" id="Bmappe">MAPPE</button>
                <button class="Bfix iphone btn btn-outline-light quicksand btn1"  id="Bshop">SHOP</button>
                <!-- PHP per sostituire il pulsante accedi con immagine e nome utente -->
                <?php
                    error_reporting(0); 
                    // display1 = immagine utente; display2 = nome utente; display3 = bottone accedi
                    if (isset($_SESSION['email'])) {
                        $display1 = 'block';
                        $display2 = $nomeUtente;
                        $display3 = 'none';
                    } else {
                        $display1 = 'none';
                        $display2 = '';
                        $display3 = 'block';
                    }
                ?>
                <button class="bprofilo iphone" style=" display:<?php echo $display1; ?>; margin-bottom:3px" id="bprofilo"></button>
                
                <button class=" Bfix baccedi iphone btn btn-outline-light quicksand btn1" style="margin-right: 5px; display:<?php echo $display3; ?>; " id="Baccedi" onclick="location.href=\'accesso.php\'">ACCEDI</button>
            </div>
            <div class="contieni_username">
                <h5 class="username iphone quicksand" style="position: fixed;"><?php echo $display2; ?></h5>
            </div>
            <div class="contieni_logout" id="profilo">    
                <button  type="submit" name="logout" id="logout" class="logout iphone btn btn-outline-light quicksand" >LOGOUT</button>
            </div>
        </div>
        
        <!-- Utilizzo grid per il corpo della pagina (colonna singola) -->
        <div class="grid" style="margin-top:100px">
            
            <!-- Riga della grid che continene il carosello -->
            <div class="c1" id="c1">
                <!-- Carosello bootstrap -->
                <div id="myCarousel" class="carousel carousel-fade w-75 m-auto" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                        <button data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                        <button data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <img src="immagini/Carosello1.jpg" class="d-block w-100" alt="...">
                            <div class="caption iphone anton">
                                IMPARA I TUOI PRIMI TRICK
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="immagini/Carosello2.jpg" class="d-block w-100" alt="...">
                            <div class="caption iphone anton" style=" width: 56%;">
                                SCOPRI GLI SKATEPARK E SKATESHOP PIU' VICINI
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="immagini/Carosello3.jpg" class="d-block w-100" alt="...">
                            <div class="caption iphone anton">
                                COMPRA TUTTO IL NECESSARIO
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                <div class="sfondo-trasparente"></div>
            </div>

            <!-- Riga della grid contenente anteprima per i video -->
            <div class="c2">
                <h2 id="Tvideo" class="quicksand" style=" text-align: left;cursor:pointer">
                    Videos
                </h2>
                <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
                <div class="container_vid">
                    <a style="color: white;" class="video" href="https://www.youtube.com/watch?v=P3T_znRTZMQ" target="_blank">
                        <img class="copertina" src="immagini/ride.webp">
                        <h2 class="titolo quicksand" style="margin-top: 2%;">Come andare in skate?</h2>
                    </a>
                    <a style="color: white;" class="video" href="https://www.youtube.com/watch?v=QUttPNF9KzM" target="_blank">
                        <img class="copertina" src="immagini/ollie.webp">
                        <h2 class="titolo quicksand" style="margin-top: 2%;">Come fare l'Ollie?</h2>
                    </a>
                    <a style="color: white;" class="video fantasma" href="https://www.youtube.com/watch?v=Xb771zBX1Gg" target="_blank">
                        <img class="copertina" src="immagini/shove.webp">
                        <h2 class="titolo quicksand" style="margin-top: 2%;">Come fare lo Shove It?</h2>
                    </a>
                </div>
            </div>

            <!-- Riga della grid contenente la mapppa -->
            <div class="c3 iphone" id="cellaMappe">
                <h2 class="quicksand" style=" text-align: left; margin-top: 10px;">
                    Mappe
                </h2>
                <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
                <!-- Bottoni per la scelta della mappa -->
                <div style="margin-bottom: 1%; background-color: rgb(255, 255, 255); vertical-align: top; height: 110px; z-index: 10; position: relative;">
                    <p class="quicksand" style="font-size: larger; font-weight: 600;">Cosa stai cercando?</p>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary quicksand" for="btnradio1">Skatepark</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
                        <label class="btn btn-outline-primary quicksand" for="btnradio2">Tutto</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary quicksand" for="btnradio3">Skateshop</label>
                    </div>
                </div>
                <!-- Collegamento a MyMaps -->
                <div style="height: 390px; overflow: hidden; text-align: center;">
                    <iframe class="mappe" src="https://www.google.com/maps/d/u/0/embed?mid=1tbl_kXUfzK2p4hQvXCgcGO_ineV_2ks&ehbc=2E312F" width="90%" height="490" id="skateshop"></iframe>
                    <iframe class="mappe" src="https://www.google.com/maps/d/u/0/embed?mid=1c8j8WkH4jeMGuteNeM0njMlEE4byEwM&ehbc=2E312F" width="90%" height="490"id="skatepark"></iframe>
                    <iframe class="mappe" src="https://www.google.com/maps/d/u/0/embed?mid=155q4x6fTGhEwpfhM4LlcNZPMwiq_G2w&ehbc=2E312F" width="90%" height="490" style="display:block" id="tutto"></iframe>
                </div>
            </div>

            <!-- Riga della grid contenente anteprima dello shop -->
            <div class="c4" style="position:relative; padding-left: 0; padding-right: 0;">
                <h2  class="quicksand" id="Tshop" style="text-align: left; margin-left: 5%;cursor:pointer">
                    Shop
                </h2>
                <hr class="lineshop">
                <!-- Scritta scorrevole-->
                <div class="scorrevole">
                    <div class="content_scorrevole">
                        <h1 class="testo_scorrevole">SCEGLI I TUOI COMPONENTI PREFERITI E ASSEMBLA LO SKATEBOARD CHE FA PER TE</h1>
                        <h1 class="testo_scorrevole">SCEGLI I TUOI COMPONENTI PREFERITI E ASSEMBLA LO SKATEBOARD CHE FA PER TE</h1>
                    </div>
                </div>

                <div style="display: flex; justify-content: center; align-items: center; width: 100%; margin-top: 3%;">
                    <div style="width:100%; position:relative;">
                        <img src="immagini/shop3.jpg" style="width: 78%;">
                        <div class="sfondo_shop"></div>
                    </div>
                    <button id="Bshop2" type="button" class="bshop iphone btn btn-outline-light quicksand">SHOP</button>
                </div>
            </div>
            <!-- PHP per ricevere messaggi dagli utenti, far comparire banner di conferma e impedire di inviare messaggi senza il login-->
            <?php
                $but = 'disabled';
                $stato = 'none';
                if(isset($_SESSION['email'])) {
                    $but = '';
                    $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("errore di connessione: " . pg_last_error() );
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($connessione){
                            $email = $_SESSION["email"];
                            $messaggio = $_POST['messaggio'];
                            $q2="insert into messaggio (email, messaggio) values ($1, $2)";
                            $data=pg_query_params($connessione, $q2, array($email, $messaggio));
                            if ($data) {
                                $stato = 'block';
                            }else{
                                $stato = 'none';
                            }
                        }
                    }
                }
            ?>

            <!-- Riga della grid per la barra finale-->
            <div class="c5 " style="display: flex; align-items: center; justify-content: space-between; background-color: #181818; height: 100px;overflow: hidden;">
                <div align="left">
                    <button <?php echo $but;?> class=" Bemail quicksand iphone " id="Bemail" type="text" size="22"> Facci una domanda </button>
                    <h1 class=" cont iphone quicksand">
                            CONTATTACI: skaterss.ltw@gmail.com
                    </h1>
                </div>
                <img src="immagini/logo.png" style="height: 170%" class="logoB iphone">
                <div>
                    <h1 class="quicksand" style=" text-align: right; font-size: small; color: rgb(255, 255, 255);">CREATORI:</h1>
                    <h1 class="creatori iphone quicksand">Finocchiaro Dario  Imperi Andrea   </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Div contenente la textArea per far inviare messaggi agli utenti   -->
    <div class="email iphone" id="email" style="display: none;"> 
        <h2 class="titemail iphone quicksand" style="position:relative;">Facci una domanda</h2>
        <img src="./immagini/x-removebg-preview.png" class="x iphone" alt="" id="xchiusura">
        <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1; width: 90%; margin-left: 5%; margin-right:5%; margin-top:1%">
        <h5 class="avviso iphone quicksand" >TI RISPONDEREMO IL PRIMA POSSIBILE VIA EMAIL :)</h5>
        <form class="quicksand" action="index.php" method="post" id="formemail" onsubmit="MinCaratteri(event)">
            <label class="label iphone" for="messaggio">Messaggio:</label><br>
            <textarea class="messaggio iphone" id="messaggio" name="messaggio" oninput="ContaCaratteri()" required></textarea><br>
            <button  type="submit" class=" binvia iphone btn btn-outline-primary quicksand">Invia</button>
        </form>
    </div>

    <!-- Alert "Messaggio inviato" -->
    <div class="alert modal-dialog quicksand" role="document"   id="alert" style="display:<?php echo $stato ?>;padding:20px">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title h5 " id="modal1Title">Messaggio inviato!</h2>
        </div>
        <div class="modal-body">
            <p>Ti risponderemo appena possibile</p>
        </div>
        <div class="modal-footer">
            <button id="ok" class=" btn btn-outline-primary btn-sm quicksand" style="margin-left: 90%;margin-top:2%;margin-bottom:0%">OK</button>
        </div>
        </div>
    </div>

    
    <!-- Collegamento al file JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
