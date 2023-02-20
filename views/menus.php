<?php
$title = 'Nos Menus';
ob_start();
?>

    
    <?php foreach ($menus as $menu): ?>
    <h2 class="titleCategoriesMenu"><?= $menu->name.' (Le  '.$menu->formula.')' ?></h2>
    <li class="titleMenu">Entrées</li>
    <li class="descriptionMenu"><?= $menu->entrance1 ?></li>
    <li class="descriptionMenu"><?= $menu->entrance2 ?></li>
    <li class="descriptionMenu"><?= $menu->entrance3 ?></li>
    <li class="titleMenu">Plats</li>
    <li class="descriptionMenu"><?= $menu->dishe1 ?></li>
    <li class="descriptionMenu"><?= $menu->dishe2 ?></li>
    <li class="descriptionMenu"><?= $menu->dishe3 ?></li>
    <li class="titleMenu">Desserts</li>
    <li class="descriptionMenu"><?= $menu->dessert1 ?></li>
    <li class="descriptionMenu"><?= $menu->dessert2 ?></li>
    <li class="descriptionMenu"><?= $menu->dessert3 ?></li>
    <li class="priceMenu"><?= $menu->price.'€'?></li>
    <?php endforeach; ?>
<?php
$content = ob_get_clean();
require_once('layout.php');