<?php

session_start();

$title = "Modifier le plat";

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
        <input type="text" name="name" id="name" class="formInput" placeholder="Nom du plat" required="required" value='<?= $disheDetail['name']?>'>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="description">Description du plat</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="description" id="description" class="formInput" placeholder="Description du plat" required="required"><?= $disheDetail['description']?></textarea>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="price">Prix</label>
    </div>
    <div class="formGroup">
        <input type="number" name="price" id="nprice" class="formInput" placeholder="Prix du plat" required="required" value='<?= $disheDetail['price']?>'>
        <input type="hidden" value="<?= $disheDetail['id']?>">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Modifier</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/entrees'>Retour à la liste des plats</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');