<?php
        session_start();
        unset($_SESSION['email']);
        if (!isset($_SESSION['email'])) {
                echo "successo";
        } else {
                echo "non successo";
        }
?>