<?php
header('Content-Type: application/json');
// Connessione al database
$connessione = pg_connect("host=localhost port=5432 dbname=Skaters user=postgres password=biar") or die("Errore di connessione al database: " . pg_last_error());

// Dati da utilizzare per l'aggiornamento
$task = $_POST['task'];
$email = $_POST['email'];

// Rimuovo dal database in base al comando che mi è stato passato
if ($task == "rimuovi") {
    $nome = $_POST['nome'];

    $query_rimuovi = "DELETE FROM articolo_carrello WHERE email = '$email' AND nome = '$nome'";
    $result_rimuovi = pg_query($connessione, $query_rimuovi);
    
    if (!$result_rimuovi) {
        $risposta['errore'] = "Errore durante la rimozione: " . pg_last_error($connessione);
        error_log(json_encode($risposta));
    }
} else {
    $query_svuota = "DELETE FROM articolo_carrello WHERE email = '$email'";
    $result_svuota = pg_query($connessione, $query_svuota);
    
    if (!$result_svuota) {
        $risposta['errore'] = "Errore durante lo svuotamento: " . pg_last_error($connessione);
        error_log(json_encode($risposta));
    }
}
?>