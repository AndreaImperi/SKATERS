<!-- PHP per eseguire il logout (consiste nello svuotare la variabile $_SESSION['email']) -->
<?php
        session_start();
        unset($_SESSION['email']);
        if (!isset($_SESSION['email'])) {
                echo "successo";
        } else {
                echo "non successo";
        }
?>