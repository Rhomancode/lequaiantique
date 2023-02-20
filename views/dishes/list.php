<?php


$title = "Liste des plats";

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
        <th class="thAdmin">description</th>
        <th class="thAdmin">prix</th>
    </tr>
    <?php foreach ($dishes as $dishe): ?>
    <tr>
        <td data-label='Nom'><?=$dishe->name ?></td>
        <td data-label='Description'><?=$dishe->description ?></td>
        <td data-label='Prix'><?=$dishe->price.'€' ?></td>
        <td><a class="addButton"href="/plat?id=<?= $dishe->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/plat/supprimer?id=<?= $dishe->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/plat/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');