<?php

session_start();

$title = "Bienvenue sur votre espace client";

ob_start();
?>

<h2>Vos informations</h2>
<p>Nom : <?= $_SESSION['user']['lastName'] ?></p>
<p>Prénom : <?= $_SESSION['user']['firstName'] ?></p>
<p>Téléphone : <?= $_SESSION['user']['phone'] ?></p>
<p>Allergies : <?= $_SESSION['user']['allergy'] ?></p>
<button href="#" class="formBtn">Modifier mes informations</button>


<?php
$content = ob_get_clean();
require('layout.php');