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
        <title>ACCESSO</title>
    </head>
    <body class="quicksand" style="overflow: hidden;">
        <?php
            $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("errore di connessione: " . pg_last_error() );
        ?>

        <div class="fixed-bar iphone">
            <div style="display: flex; justify-content: center; align-items: center; height: 0vh; width: 96vw;background-color: white; margin-top: 1%;">
            <a href="../index.php" style="margin-top:-5%;margin-left:38%">
                <img src="../immagini/logo.png" class="logo iphone" >
            </a> 
            </div>
            <h2 style="color: black; font-weight: 700;">Accedi</h2>
            <hr style="border-color: #333; border-width: 3px; margin-bottom: 30px; margin-top: 1px; opacity: 1;">
        </div>
        
        <div class="grid">
            <div class="c1 iphone" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div class="overlay iphone" >
            <h3 style="margin-top: 2%; color:white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">SKATERS</h3>
                <H1 style="font-size: small;margin-bottom:0%; color:white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;">Entra con le tue credenziali</H1>
                <hr class="linea" id="linea-grigia" style="color: rgb(255, 255, 255);margin-top: 5%;margin-right: 15%;">
                <form name="formAcc" action="" method="POST">
                    <label for="email" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;" class="label">E-mail:</label><br>
                    <input type="text" id="email" name="email" class="input iphone"><br>
                    <label for="password" style="color: white; text-shadow: -0.5px -0.5px 0 black, 0.5px -0.5px 0 black, -0.5px 0.5px 0 black, 0.5px 0.5px 0 black;" >Password:</label><br>
                    <input type="password" id="password" name="password" class="input iphone">
                    <input type="submit" value="Submit" class="btn btn-outline-primary quicksand" style="margin-top:5%">
                    </form>
                <br>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($connessione){
                            $email = $_POST["email"];
                            $q1 = "select * from utente where email = $1";
                            $result=pg_query_params($connessione, $q1, array($email));
                            if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                $pswd = $_POST['password'];
                                $q2= "select * from utente where email = $1 and pswd = $2";
                                $data=pg_query_params($connessione, $q2, array($email, $pswd));
                                
                                if ($data) {
                                    session_start();

                                    $_SESSION['email'] = $email;
                                    $nome = $tuple['nome'];
                                    $_SESSION['nome'] = $nome;
                                    //$session = $_SESSION['nome'];
                                    //$ciao = $tuple['nome'];
                                    //echo "benvenuto, $session";

                                    
                                    header("Location: ../index.php");

                        
                                    
                            } else {
                                $_SESSION['utente_loggato'] = false;
                                echo "<h1 style=\"font-size: small; color: red;display: inline-block; font-size: small\">!l'indirizzo email non risulta registrato!</h1>";
                            }
                        }
                    }
                }
            
                ?>

                <hr class="linea iphone" id="linea-grigia">
            <div  style="text-align: center;margin-bottom: 4%;">
                <h1 class="reg iphone">Non hai un account?</h1>
                <a class="reg iphone" href="../registrazione/registrazione.php" id="Bregistrazione">REGISTRATI</a>

            </div>
            </div>
                
        </div>
        
        <script src="script.js"></script>
       
        <img src="../immagini/accesso1.png" class="basso iphone" alt="">
    </body>
</html>



