<?php
$title = 'La Carte';
ob_start();
?>

<h2 class="titleCategoriesMenu">Les Entrées</h2>
    <?php foreach ($entrances as $entrance): ?>
    <li class="titleMenu"><?= $entrance->name ?></li>
    <li class="descriptionMenu"><?= $entrance->description ?></li>
    <li class="priceMenu"><?= $entrance->price.'€'?></li>
    <?php endforeach; ?>
<h2 class="titleCategoriesMenu">Les Plats</h2>
    <?php foreach ($dishes as $dishe): ?>
    <li class="titleMenu"><?= $dishe->name ?></li>
    <li class="descriptionMenu"><?= $dishe->description ?></li>
    <li class="priceMenu"><?= $dishe->price.'€' ?></li>
    <?php endforeach; ?>
<h2 class="titleCategoriesMenu">Les Désserts</h2>
    <?php foreach ($desserts as $dessert): ?>
    <li class="titleMenu"><?= $dessert->name ?></li>
    <li class="descriptionMenu"><?= $dessert->description ?></li>
    <li class="priceMenu"></class><?= $dessert->price.'€' ?></li>
    <?php endforeach; ?>  
<?php
$content = ob_get_clean();
require_once('layout.php');