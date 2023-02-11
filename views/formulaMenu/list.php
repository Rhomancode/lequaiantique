<?php

$title = "Liste des formules de menu";

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
    </tr>
    <?php foreach ($formulas as $formula): ?>
    <tr>
        <td><?=$formula->name ?></td>
        <td><a class="addButton"href="/formule?id=<?= $formula->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/formule/supprimer?id=<?= $formula->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/formule/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');