<?php

session_start();

$title = "Cette page n'existe pas";

ob_start();
?>

<a href="/">Retourner à l'écran d'accueil</a>

<?php
$content = ob_get_clean();
require('layout.php');