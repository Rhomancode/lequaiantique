<?php

session_start();

$title = "Ajouter un dessert";

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
        <input type="text" name="name" id="name" class="formInput" placeholder="Nom du dessert" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="description">Description du dessert</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="description" id="description" class="formInput" placeholder="Description du dessert" required="required"></textarea>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="price">Prix</label>
    </div>
    <div class="formGroup">
        <input type="number" name="price" id="price" class="formInput" placeholder="Prix du dessert" required="required">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Ajouter</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/plats'>Retour à la liste des desserts</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');