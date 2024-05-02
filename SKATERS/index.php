<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<?php 
    session_start();
    error_reporting(0);
    $nomeUtente = $_SESSION['email'];
    $ciao = $_SESSION['nome'];
?> 

    
    
   

    <div class="corpo" id="corpo">
    <div class="fixed-bar">
        <!-- <button class="btn btn-outline-secondary btn-lg">LOGO</button> -->
        <img src="immagini/logo.png" style="height: 120%; margin-top: -0.6%; margin-left: 1%;">
        <div style="display: flex; justify-content: right; align-items: end; height: 0vh; width: 96vw; margin-top: -1.3%;">
            <button class="btn btn-outline-light quicksand btn1" style="margin-right: 5px;" id="Bvideo" >VIDEOS</button>
            <button class="btn btn-outline-light quicksand btn1" style="margin-right: 5px;" id="Bmappe">MAPPE</button>
            <button class="btn btn-outline-light quicksand btn1" style="margin-right: 5px;" id="Bshop">SHOP</button>
            <?php
            //session_start();
            error_reporting(0); 
            if (isset($_SESSION['email'])) {
                $display1 = 'block';
                $display2 = $ciao;
                $display3 = 'none';
                // Se l'utente è loggato, mostra l'immagine al posto del bottone Accedi
                //echo '<button style="background-image: url(./immagini/account.jpg); margin-left:35px; height: 50px; width: 50px; background-size: cover; background-position: center; border-radius:100px; display:block;" id="bruota"></button>
                //<h5 class="quicksand" style="position: absolute; margin-bottom: -1.3%; margin-right: -0.1%;">'.$ciao.'</h5>
                //<button class="btn btn-outline-light quicksand" style="margin-right: 5px; display:none; height: 50px;" id="Baccedi" onclick="location.href=\'accesso.php\'">ACCEDI</button>';
            } else {
                $display1 = 'none';
                $display2 = '';
                $display3 = 'block';
                // Se l'utente non è loggato, mostra il normale bottone Accedi
                //echo '<button style="background-image: url(./immagini/account.jpg); height: 50px; width: 50px; background-size: cover; background-position: center; border-radius:100px; display:none;" id="bruota"></button>
                //<h5 class="quicksand" style="position: absolute; margin-bottom: -1.3%; margin-right: -0.1%; display:none;">'.$ciao.'</h5>
                //<button class="btn btn-outline-light quicksand btn1" style="margin-right: 5px; display:block; height: 50px;" id="Baccedi" onclick="location.href=\'accesso.php\'">ACCEDI</button>';
            }
            $email = $_SESSION['email'];
            $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

            $query = "SELECT * FROM utente WHERE email = $1";
            $result = pg_query($connessione, $query);

            if ($result){
                $utente = pg_fetch_assoc($result);
                $nomeUtente = $utente['nome'];
            }
        ?>
        <button style="background-image: url(./immagini/account.jpg); margin-left:35px; height: 50px; width: 50px; background-size: cover; background-position: center; border-radius:100px; display:<?php echo $display1; ?>;" id="bruota"></button>
        <h5 class="quicksand" style="position: absolute; margin-bottom: -1.3%; margin-right: -0.1%;"><?php echo $display2; ?></h5>
        <button class="btn btn-outline-light quicksand" style="margin-right: 5px; display:<?php echo $display3; ?>; height: 50px;" id="Baccedi" onclick="location.href=\'accesso.php\'">ACCEDI</button>

        </div>
        <div id="profilo" style="background-color: #181818; height: 50px; width: 105px; position: absolute; margin-left: 90.5%; margin-top: 1.1%; border-radius: 10px;z-index: 9999; border: 3px solid black; display:none; text-align:center;  ">    
            <button type="submit" name="logout" id="logout" style="height: 45px; width: 100px;" class="btn btn-outline-light quicksand" >LOGOUT</button>
        </div>
    </div>
    
    <div class="grid" style="margin-top:6.5%">
        
        <div class="c1" id="c1">
            <div id="myCarousel" class="carousel carousel-fade w-75 m-auto" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                    <button data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                    <button data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="immagini/Carosello1.jpg" class="d-block w-100" alt="..." style="max-height: 100%;" >
                        <div class="caption1">
                            <h5 class="anton" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">IMPARA I TUOI PRIMI TRICK</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="immagini/Carosello2.jpg" class="d-block w-100" alt="..." style="max-height: 100%;" >
                        <div class="caption2">
                            <h5 class="anton" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">SCOPRI GLI SKATEPARK E SKATESHOP PIU' VICINI</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="immagini/Carosello3.jpg" class="d-block w-100" alt="..." style="max-height: 100%;"  >
                        <div class="caption3">
                            <h5 class="anton" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">COMPRA TUTTO IL NECESSARIO</h5>
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

        <div class="c2">
            <h2 id="Tvideo" class="quicksand" style=" text-align: left;">
                Videos
            </h2>
            <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
            <a style="color: white;" class="video" href="https://www.youtube.com/watch?v=P3T_znRTZMQ" target="_blank">
                <img class="copertina" src="immagini/ride.webp">
                <h2 class="titolo quicksand" id="black" style="margin-top: 2%;">Come andare in skate?</h2>
            </a>
            <a style="color: white;" class="video" href="https://www.youtube.com/watch?v=QUttPNF9KzM" target="_blank">
                <img class="copertina" src="immagini/ollie.webp">
                <h2 class="titolo quicksand" id="black" style="margin-top: 2%;">Come fare l'Ollie?</h2>
            </a>
            <a style="color: white;" class="video" href="https://www.youtube.com/watch?v=Xb771zBX1Gg" target="_blank">
                <img class="copertina" src="immagini/shove.webp">
                <h2 class="titolo quicksand" id="black" style="margin-top: 2%;">Come fare lo Shove It?</h2>
            </a>
        </div>
        <div class="c3" id="cellaMappe">
            <h2 class="quicksand" style=" text-align: left; margin-top: 10px;">
                Mappe
            </h2>
            <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">

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
            <div class="mappe" style="height: 390px; overflow: hidden; text-align: center;">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1tbl_kXUfzK2p4hQvXCgcGO_ineV_2ks&ehbc=2E312F" width="90%" height="490" style="margin-top: -100px; display:none; position: relative;" id="skateshop"></iframe>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1c8j8WkH4jeMGuteNeM0njMlEE4byEwM&ehbc=2E312F" width="90%" height="490" style="margin-top: -100px; position: relative; display:none;" id="skatepark"></iframe>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=155q4x6fTGhEwpfhM4LlcNZPMwiq_G2w&ehbc=2E312F" width="90%" height="490"  style="margin-top: -100px; position: relative; " id="tutto"></iframe>
                
            </div>
        </div>
        <div class="c4" >
            <h2  class="quicksand" style="text-align: left; margin-left: 5%;">
                Shop
            </h2>
            <hr style="border-color: #333; border-width: 3px; margin-bottom: 5px; margin-top: 1px; opacity: 1; margin-left: 5%; width: 90%;">
            <div style="display: flex; justify-content: center; align-items: center; height: 45vh; width: 100%; margin-top: 2%;">
                <img src="immagini/shop3.jpg" style="width: 78%;">
                <button id="Bshop2" type="button" class="btn btn-outline-light quicksand" style="position: absolute; z-index: 2;width: 100px;height: 50px;font-size:x-large;">SHOP</button>
            </div>
            <div class="sfondo-trasparente-shop" id="sfondo" style="z-index: 1;"></div>
        </div>
        <div class="c5" style="display: flex; align-items: center; justify-content: space-between; background-color: #181818; height: 100px;overflow: hidden;">
            <div align="left">
                
                <input class="quicksand" type="text" placeholder="Facci una domanda" size="22" style="margin-bottom: 7%; border-radius: 5px;">
                <h1 class="quicksand" style=" text-align: left; font-size: small; color: rgb(255, 255, 255); ">
                    CONTATTACI: skaters@gmail.com
                </h1>
            </div>
           
            <!-- <button style="text-align: center;">LOGO</button> -->
            <img src="immagini/logo.png" style="height: 170%;">

            <div>
                <h1 class="quicksand" style=" text-align: right; font-size: small; color: rgb(255, 255, 255);">CREATORI:</h1>
                <h1 class="quicksand" style=" text-align: left; font-size: small; color: rgb(255, 255, 255);">Imperi Andrea e Dario Finocchiaro</h1>
            </div>
        </div>
    </div>
    </div>
      
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
