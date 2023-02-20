<?php

$title = "Liste des images d'accueil";

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
        <th class="thAdmin">Image</th>
        <th class="thAdmin">Titre</th>
    </tr>
    <?php foreach ($images as $image): ?>
    <tr>
        <td data-label='Image'><image class="imageBddList" src="assets/images/img_bdd/<?= $image->img ?>"></td>
        <td data-label='Titre'><?=$image->title ?></td>
        <td><a class="addButton"href="/image?id=<?= $image->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/image/supprimer?id=<?= $image->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/image/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');