<!-- PHP che restituisce l'email dell'account loggato se è stato effettuato il login, altrimenti restituisce la stringa vuota -->

<?php
    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $response = array('email' => $email);
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('email' => '');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>