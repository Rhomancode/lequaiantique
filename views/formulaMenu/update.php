<?php

$title = "Ajouter une formule de menu";

ob_start();
if (!empty($messageError)) { ?>
    <p class="errorMessage"><?php echo $messageError ?></p>
<?php }
if (!empty($messageSuccess)) { ?>
    <p class="successMessage"><?php echo $messageSuccess ?></p>
<?php }
?>
<form class="form" id="form" action="" method="post">
    <div class="formGroup">
        <label class="formLabel" for="name">Nom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="name" id="name" class="formInput" placeholder="Nom de la formule" required="required" value='<?= $formulaDetail['name']?>'>
        <input type="hidden" value="<?= $formulaDetail['id']?>">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Modifier</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/formules'>Retour à la liste des formules de menu</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');