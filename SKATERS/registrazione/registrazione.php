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
    <?php
        $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("errore di connessione: " . pg_last_error() );
    ?>

    <div class="fixed-bar iphone" style="margin-top: 0%;">
        <div class="space iphone">
            <!-- <button>LOGO</button>  -->
            <a href="../index.php" style="margin-top:1.1%;">
                <img src="../immagini/logo.png" class="logo iphone">
            </a> 
        </div>
        <h2 class="registrati_scritta" style="color: black; font-weight: 700;">Registrati</h2>
        <hr  class="linea" style="border-color: #333; border-width: 3px; opacity: 1;">
    </div>
    <img src="../immagini/ruota2.png" class="immaginesxU" >
    <img src="../immagini/ruota3.png" class="immaginesxD" >

    <div class="grid">
        <div class="c1 iphone">
            <form name="formReg" action="registrazione.php" method="POST" > 
                

                <table class="iphone">
                    <tr>
                        <td colspan='3' style="text-align: left;">Nome:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="text-align: left;">
                            <input type="text" name="nome" size="30" maxlength="20" pattern="[A-Za-z]+" required>
                        </td>
                    </tr>
                    <tr style="height: 60px; vertical-align: bottom;">
                        <td colspan='3' style="text-align: left;">Cognome:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="text-align: left;">
                            <input type="text" name="cognome" size="30" maxlength="30" pattern="[A-Za-z]+" required>
                        </td>
                    </tr>
                    <!-- <hr class="linea" style="border-color: #c9c7c7; border-width: 3px; margin-bottom: 1px; margin-top: 1px; opacity: 1;  width: 80%; margin-left: 25% ;"> -->
                    <tr style="height: 120px;">
                        <td colspan="3">
                                <hr class="linea" style="border-color: #181818; border-width: 3px; margin-bottom: 1px; margin-top: 1px; opacity: 1;  width: 100%; margin-left: 0% ;">
                        </td>
                    </tr>
                    <tr style="height: 20px; margin-bottom: 10%;">
                        <td colspan='3' class="sfondo data-tit" style="text-align: left;">Data di nascita:</td>
                    </tr>
                    
                    <tr>
                        <td style="width: 33%; text-align: left;"> 
                            <label class="label iphone">Giorno:</label>
                            <input type="text" name="giorno" maxlength="2" class="input iphone" pattern="^(0?[1-9]|[12][0-9]|3[01])$" required>
                        </td>
                        <td style="width: 33%; text-align: center;">
                            <label class="input-mese iphone">Mese:</label>
                            <select name="mese" size="1" cols="13" required class="Smese">
                                <option value="nessuna"></option>
                                <option value="Gennaio">Gennaio</option>
                                <option value="Febbraio">Febbraio</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Aprile">Aprile</option>
                                <option value="Maggio">Maggio</option>
                                <option value="Giugno">Giugno</option>
                                <option value="Luglio">Luglio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Settembre">Settembre</option>
                                <option value="Ottobre">Ottobre</option>
                                <option value="Novembre">Novembre</option>
                                <option value="Dicembre">Dicembre</option>
                            </select>
                        </td>
                        <td style="width: 33%; text-align: left;">
                            <label class="label-anno iphone">Anno:</label>
                            <input type="text" name="anno" maxlength="4"class="input-anno iphone" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2' style="text-align: left; height: 60px; vertical-align: bottom;">Genere:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="width: 30%; text-align: left; margin: 0; ">
                            <select name="genere" size="1" cols="4">
                                <option value="nessuna"></option>
                                <option value="uomo">Uomo</option>
                                <option value="donna">Donna</option>
                                <option value="pnd">Preferisco non dirlo</option>
                            </select>
                        </td>
                    </tr>
                    <tr style="height: 120px;">
                        <td colspan="3">
                                <hr class="linea" style="border-color: #181818; border-width: 3px; margin-bottom: 1px; margin-top: 1px; opacity: 1;  width: 100%; margin-left: 0% ;">
                        </td>
                    </tr>
                    <tr>
                    <td colspan='3' class="labels" style="text-align: left;">E-mail:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="text-align: left;">
                            <input class="inputs" type="email" name="email" size="30" maxlength="30" required>
                        </td>
                    </tr>
                    <tr style="height: 60px; vertical-align: bottom;">
                        <td colspan='3' style="text-align: left;">Password:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="text-align: left;">
                            <input type="password" name="password" id="psw" size="30" maxlength="30" required>
                        </td>
                    </tr>
                    <tr style="height: 60px; vertical-align: bottom;">
                        <td colspan='3' class="conferma-tit" style="text-align: left;">Conferma:</td>
                    </tr>
                    <tr>
                        <td colspan='3' style="text-align: left;">
                            <input type="password" name="conferma" id="cpsw" size="30" maxlength="30" required>
                            <br>
                            <span id="epsw" style="color: red;"></span>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" colspan="2" style="font-size: small;">
                            <label style="margin-right: 5px;">Mostra password:</label>
                            <input type="checkbox" name="mostrap" id="mostra">
                        </td>
                    </tr>
                    <tr style="height: 120px;">
                        <td colspan="3">
                                <hr class="linea" style="border-color: #181818; border-width: 3px; margin-bottom: 1px; margin-top: 1px; opacity: 1;  width: 100%; margin-left: 0% ;">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <select name="paese" style="width: 95%;">
                                <option value="italia">Italia</option>
                                <option value="francia">Francia</option>
                                <option value="germania">Germania</option>
                                <!-- Aggiungere altre -->
                            </select>
                        </td>
                        <td align="left" style="text-align: left;">
                            <input type="text" name="n_telefono" id="n_telefono" pattern="^\+?[0-9\s()-]{6,20}$" size="22" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" id="registrati" style="margin-top: 10%;" class="btn btn-outline-primary quicksand"> REGISTRATI </button>
                        </td>
                        <td colspan="4" style="vertical-align: middle;">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if ($connessione){
                                    $email = $_POST["email"];
                                    $q1 = "select * from utente where email = $1";
                                    $result=pg_query_params($connessione, $q1, array($email));
                                    if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                        echo "<br/><h1 style=\"font-size: medium; color: red;\"> !esiste già un account con questo indirizzo email! <br/> <a href=../accesso/accesso.php style=\"font-size: medium; color: red; \"> vai al login </a></h1> ";
                                    } else {
                                        $nome = $_POST['nome'];
                                        $cognome = $_POST['cognome'];
                                        $giorno = $_POST['giorno'];
                                        $mese = $_POST['mese'];
                                        $anno = $_POST['anno'];
                                        $genere = $_POST['genere'];
                                        $pswd = $_POST['password']; 
                                        $n_tel = $_POST['n_telefono'];
                                        $q2="insert into utente (email, nome, cognome, giorno, mese, anno, genere, pswd, n_tel) values ($1, $2, $3, $4, $5, $6, $7, $8, $9)";
                                        $data=pg_query_params($connessione, $q2, array($email, $nome, $cognome, $giorno, $mese, $anno, $genere, $pswd, $n_tel));
                                        $_SESSION['$nome'] = $nome;
                                        if ($data) {
                                            echo "<br/><h1 style=\"font-size: medium;\"> Registrazione completata. <a href=../accesso/accesso.php style=\"font-size: medium; color: red; \"> clicca qui per loggarti </a></h1> ";
                                        }
                                    }
                                }
                                
                            }
                        ?>
                        </td>

                    </tr>
                </table>

            </form>
        </div>

        <img src="../immagini/ruota4.png" class="immaginedxU"  >
        <img src="../immagini/ruota1.png" class="immaginedxD"  >


        <img src="../immagini/tavola_reg.JPG" class="angolosx" alt="">
        <img src="../immagini/tavola_reg.JPG" class="angolodx" alt="">

        
        <script>
    
        window.addEventListener('scroll', function() {
            // Ottieni la posizione verticale dello scrolling della pagina
            var scrollPosition = window.scrollY;
        
            // Calcola l'angolo di rotazione in base alla posizione dello scrolling
            var rotationAngle = scrollPosition * 0.5; // Modifica il fattore 0.5 per regolare la velocità di rotazione
        
            // Seleziona tutte le immagini con le classi 'immaginedx' e 'immaginesx'
           var immagined = document.querySelector('.immaginedxU');
            var immagineds = document.querySelector('.immaginedxD');
            var immaginesu = document.querySelector('.immaginesxU');
            var immaginesd = document.querySelector('.immaginesxD');

        
            // Applica la rotazione a ciascuna immagine utilizzando CSS
            immagined.style.transform = 'rotate(' + rotationAngle + 'deg)';
            immagineds.style.transform = 'rotate(' + rotationAngle + 'deg)';
            immaginesu.style.transform = 'rotate(' + rotationAngle + 'deg)';
            immaginesd.style.transform = 'rotate(' + rotationAngle + 'deg)';

        });

             //Conferma Password
            var password = document.getElementById("psw");
            var c_password = document.getElementById("cpsw");
            var password_e = document.getElementById("epsw");
            var registrati = document.getElementById("registrati");

            function validatePassword(){
                if (password.value != c_password.value){
                    password_e.innerHTML = "!Le Password non corrispondono!";
                    registrati.disabled = true;
                return false;
                }
                else{
                    password_e.innerHTML = "";
                    registrati.disabled = false;
                    return true;
                }
            }
            c_password.onkeyup = validatePassword;

                document.addEventListener('DOMContentLoaded', function () {
                var passwordV = document.getElementById('psw');
                var passwordN = document.getElementById('cpsw');
                var mostra =document.getElementById('mostra');
                
                mostra.addEventListener('change', function(){
                    if (mostra.checked){
                        passwordV.type = 'text';
                        passwordN.type = 'text';
                    }else{
                        passwordV.type = 'password';
                        passwordN.type = 'password';
                    }
                })


            });
          
        </script>
</body>
</html>
       