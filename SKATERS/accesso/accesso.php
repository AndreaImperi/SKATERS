<html>
    <head></head>
    <body>
        <?php

        print_r($_SERVER["REQUEST_METHOD"]);
        print_r($_POST);
       

        $connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("errore di connessione: " . pg_last_error() );

        if (!$connessione){
            die("Connessione al database fallita: " . pg_last_error());
        } else {
            $email = $_POST["username"];
            $q1 = "select * from utente where email = $1";
            $result=pg_query_params($connessione, $q1, array($email));
            if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $pswd = $_POST['password'];
                $q2= "select * from utente where email = $1 and pswd = $2";
                $data=pg_query_params($connessione, $q2, array($email, $pswd));
                if ($data) {
                    echo "<h1> Login eseguito. <a href=../index.html> Clicca qui per andare alla home </a> <br/></h1>";
                }
            } else {
                echo "<h1> Spiacente, l'indirizzo email non è registrato</h1>
                    se vuoi, <a href=../registrazione/registrazione.html> clicca qui per registrarti </a>, altrimenti prova con un'altra email";
            }
        }
        ?>
    </body>
        
</html>