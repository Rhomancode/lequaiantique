<?php

session_start();

$title = "Bienvenue au Quai Antique";

ob_start();
?>

<?php
$content = ob_get_clean();
require('layout.php');