<?php

$title = "Liste des menus";

ob_start();
if (!empty($messageError)) { ?>
    <p class="errorMessage"><?php echo $messageError ?></p>
<?php }
if (!empty($messageSuccess)) { ?>
    <p class="successMessage"><?php echo $messageSuccess ?></p>
<?php }
?>

<table class="tabAdmin">
    <tr>
        <th class="thAdmin">nom</th>
        <th class="thAdmin">formule</th>
        <th class="thAdmin">prix</th>
    </tr>
    <?php foreach ($menus as $menu): ?>
    <tr>
        <td data-label='Nom'><?=$menu->name ?></td>
        <td data-label='Formule'><?=$menu->formula ?></td>
        <td data-label='Prix'><?=$menu->price.'€' ?></td>
        <td><a class="addButton"href="/menu?id=<?= $menu->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/menu/supprimer?id=<?= $menu->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/menu/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');