<?php

session_start();

$title = "Vous n'avez pas accès à cette page";

ob_start();
?>

<a href="/">Retourner à l'écran d'accueil</a>

<?php
$content = ob_get_clean();
require('layout.php');