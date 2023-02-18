<?php

session_start();

$title = "Bienvenue au Quai Antique";

ob_start();
?>
<h2 class="subTitleHome">Nos plus gros succès</h2>
<div class="wrapper">
    <nav class="navGallery">
        <?php foreach($images as $image): ?>
        <a href="#<?= $image->id ?>">
            <img class="imageNav imageCaroussel" src="assets/images/img_bdd/<?= $image->img ?>">
        </a>
        <?php endforeach; ?> 
    </nav>
    <div class="gallery">
    <?php foreach($images as $image): ?>
        <img class="imageGallery imageCaroussel" id="<?= $image->id ?>" src="assets/images/img_bdd/<?= $image->img ?>" alt="<?= $image->title ?>"/>
        <p class="titleGallery"><?= $image->title ?></p>
    <?php endforeach; ?>
    </div>
</div>
<div class="containerHome">
    <button type="button" class="btnReservation"><a class="linkBtn" href="/reservation">Reserver</a></button>
    <p class="textHome">
    Voici le site web de notre Restaurant 
    <strong>Le Quai Antique</strong> à Chambery venez découvrir autour d'une table la saveur de la savoie préparé 
    par nos équipes dirigé par notre chef
    Arnaud Michant.
    Vous pouvez <strong>réserver</strong> votre tables sur ce dernier et 
    consulter <strong>notre carte</strong> ainsi que les <strong>différents menus</strong>.
    </p>
    <img class="logoHome" src="../assets/images/lequaiantiquelogo.png" alt="logo-restaurant">
    <img class="chiefImg" src="../assets/images/chef.jpg" alt="Arnaud Michant">
    <a class="linkHome1" href="la-carte">Notre carte</a>
    <a class="linkHome2" href="nos-menus">Nos menus</a>
</div>
<?php
$content = ob_get_clean();
require('layout.php');