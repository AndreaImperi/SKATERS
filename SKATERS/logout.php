<!-- PHP per eseguire il logout (consiste nello svuotare la variabile $_SESSION['email']) -->
<!-- mi accorgo che il login è stato eseguito se la variabile $_SESSION['email'] è settata -->
<?php
session_start();
unset($_SESSION['email']);

header("Location: ./index.php");
?>