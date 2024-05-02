<?php
        header('Content-Type: application/json');
                // Distruggi tutte le variabili di sessione
                
                $_SESSION = array();

                // Distruggi la sessione
                //session_destroy();


                // Reindirizza l'utente alla pagina di accesso
                //header("Location: index.php");
                $risposta = array($_POST['ciao']);
                echo json_encode($risposta);

?>