<?php
header('Content-Type: application/json');
// Connessione al database
$connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

// Dati da utilizzare per l'inserimento
$nome = $_POST['nome'];
$email = $_POST['email'];

// Eseguo l'inserimento nel database con i dati che ricevo dalla richiesta POST, (se l'articolo è gia presente incremento la quantità)
$query_verifica = "SELECT * FROM articolo_carrello WHERE nome = '$nome' AND email = '$email'";
$result_verifica = pg_query($connessione, $query_verifica);
$risposta = array();

if (!$result_verifica) {
    $risposta['errore'] = "Errore durante la verifica: " . pg_last_error($connessione);
    error_log(json_encode($risposta));
}

if (pg_num_rows($result_verifica) > 0) {
    $query_update = "UPDATE articolo_carrello SET quantità = quantità + 1 WHERE nome = '$nome' AND email = '$email'";
    $result_update = pg_query($connessione, $query_update);
    
    if (!$result_update) {
        $risposta['errore'] = "Errore durante l'aggiornamento della quantità: " . pg_last_error($connessione);
        error_log(json_encode($risposta));
    }
} else {
    $img = $_POST['img'];
    $taglia = $_POST['taglia'];
    $prezzo = $_POST['prezzo'];
    $quantita = 1; 

    $query_insert="insert into articolo_carrello (nome, img, taglia, prezzo, email, quantità) values ($1, $2, $3, $4, $5, $6)";
    $result_insert=pg_query_params($connessione, $query_insert, array($nome, $img, $taglia, $prezzo, $email, $quantita));
    
    if (!$result_insert) {
        $risposta['errore'] = "Errore durante l'inserimento della tupla: " . pg_last_error($connessione);
        error_log(json_encode($risposta));
    }else {
        $risposta['successo'] = true;
    }
    error_log(json_encode($risposta));

    echo json_encode($risposta);
}
?>