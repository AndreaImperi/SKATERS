<!DOCTYPE html>
<html>
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
        <title>ACCESSO</title>
    </head>
    <body class="quicksand" style="overflow: hidden;">

        <?php
            $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("errore di connessione: " . pg_last_error() );
        ?>

        <!-- Topbar con logo e scritta Accedi -->
        <div class="fixed-bar ipad iphone">
            <div style="display: flex; justify-content: center; align-items: center; height: 0vh; width: 96vw;background-color: white; margin-top: 1%;">
                <a href="../index.php" style="margin-top:-5%;margin-left:38%">
                    <img src="../immagini/logo.png" class="logo ipad iphone" >
                </a> 
            </div>
            <h2 class="accedi_scritta" style="color: black; font-weight: 700;">Accedi</h2>
            <hr class="sotto_scritta" style="border-color: #333; border-width: 3px; opacity: 1;">
        </div>
        
        <!-- Utilizzo grid per il corpo della pagina (colonna singola) -->
        <div class="grid">

            <!-- Riga unica della grid che continene il form -->
            <div class="c1 iphone" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                <!-- Velo nero trasparente -->
                <div class="overlay iphone" >
                    <h3 style="margin-top: 2%; color:white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">SKATERS</h3>
                    <h1 style="font-size: small;margin-bottom:0%; color:white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">Entra con le tue credenziali</h1>
                    <hr class="linea" id="linea-grigia" style="color: rgb(255, 255, 255);margin-top: 5%;margin-right: 15%;">
                    <form name="formAcc" action="" method="POST">
                        <label for="email" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;" class="label">E-mail:</label><br>
                        <input type="text" id="email" name="email" class="input iphone"><br>
                        <label for="password" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;" >Password:</label><br>
                        <input type="password" id="password" name="password" class="input iphone">
                        <input type="submit" value="Submit" class="btn btn-outline-primary quicksand" style="margin-top:5%">
                        </form>
                    <br>
                    <hr class="linea iphone" id="linea-grigia">
                    <div  style="text-align: center;margin-bottom: 4%;">
                        <h1 class="reg iphone">Non hai un account?</h1>
                        <a class="reg iphone" href="../registrazione/registrazione.php" id="Bregistrazione">REGISTRATI</a>
                    </div>
                </div>
                
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $pswd = $_POST['password'];
                $q1 = "SELECT * FROM utente WHERE email = $1";
                $result = pg_query_params($connessione, $q1, array($email));
                if ($result) {
                    if (pg_num_rows($result) > 0) {
                        $q2 = "SELECT * FROM utente WHERE email = $1 AND pswd = $2";
                        $result_2 = pg_query_params($connessione, $q2, array($email, $pswd));
                        if ($result_2) {
                            if (pg_num_rows($result_2) > 0) {
                                $tuple=pg_fetch_array($result_2, null, PGSQL_ASSOC);
                                session_start();
                                $_SESSION['email'] = $email;
                                $nome = $tuple['nome'];
                                $_SESSION['nome'] = $nome;
                                $session = $_SESSION['nome'];
                                $ciao = $tuple['nome'];
                                echo "benvenuto, $session";
                                // Aggiorna il timestamp dell'ultima attività
                                $_SESSION['LAST_ACTIVITY'] = time();
                                header("Location: ../index.php");
                            } else {
                                $_SESSION['utente_loggato'] = false;
                                echo "<h1 class=\"mess_err\">!password errata!</h1>";
                            }
                        }
                    } else {
                        $_SESSION['utente_loggato'] = false;
                        echo "<h1 class=\"mess_err\">!l'indirizzo email non risulta registrato!</h1>";
                    }
                }
            }
    
        ?>
        <!-- Collegamento al file JavaScript -->
        <script src="script.js"></script>
        
        <!-- Sfondo  pagina -->
        <img src="../immagini/accesso1.png" class="basso iphone" alt="">
    </body>
</html>



