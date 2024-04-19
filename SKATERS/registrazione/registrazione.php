<html>
    <head>
        <title>
            Esempio
        </title>
    </head>
    <body>
        <?php

        print_r($_POST);
        print_r($GLOBALS);

        $connessione = pg_connect("host=localhost port=5432 dbname=Skaterss user=postgres password=Lamborghini02!") or die("errore di connessione: " . pg_last_error() );

        if (!$connessione){
            die("Connessione al database fallita: " . pg_last_error());
        } else {
            $email = $_POST["email"];
            $q1 = "select * from utente where email = $1";
            $result=pg_query_params($connessione, $q1, array($email));
            if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                echo "<h1> Spiacente, l'indirizzo email non è disponibile</h1>
                    se vuoi, <a href=../accesso/accesso.html> clicca qui per loggarti </a>";
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
                if ($data) {
                    echo "<h1> Registrazione completata. Puoi iniziare ad usare il sito <br/></h1>";
                    echo "<a href=../accesso/accesso.html> clicca qui per loggarti </a>";
                }
            }
        }
        ?>
    </body>
        
</html>