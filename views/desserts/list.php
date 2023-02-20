<?php

$title = "Liste des desserts";

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
    <?php foreach ($desserts as $dessert): ?>
    <tr>
        <td data-label='Nom'><?=$dessert->name ?></td>
        <td data-label='Description'><?=$dessert->description ?></td>
        <td data-label='Prix'><?=$dessert->price.'€' ?></td>
        <td><a class="addButton"href="/dessert?id=<?= $dessert->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/dessert/supprimer?id=<?= $dessert->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/dessert/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');