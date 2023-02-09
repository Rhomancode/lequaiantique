<?php

session_start();

$title = "Liste des entrées";

ob_start();
?>

<table class="tabAdmin">
    <tr>
        <th class="thAdmin">nom</th>
        <th class="thAdmin">description</th>
        <th class="thAdmin">prix</th>
    </tr>
    <?php foreach ($entrances as $entrance): ?>
    <tr>
        <td><?=$entrance->name ?></td>
        <td><?=$entrance->description ?></td>
        <td><?=$entrance->price.'€' ?></td>
        <td><a class="addButton"href="/entree?id=<?= $entrance->id; ?>">Modifier</a></td>
        <td><a class="delButton"href="/entree?id=<?= $entrance->id; ?>">Supprimer</a></td>
    </tr>
    <?php endforeach; ?>
    <a class="addButton" href='/entree/ajouter'>Ajouter</a>
</table>

<?php
$content = ob_get_clean();
require('../views/layout.php');