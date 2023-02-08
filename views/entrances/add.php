<?php

session_start();

$title = "Ajouter une entrée";

ob_start();
if (!empty($message)) { ?>
    <p class="errorMessage"><?php echo $message ?></p>
<?php } ?>
<form class="form" id="form" action="" method="post">
    <div class="formGroup">
        <label class="formLabel" for="name">Nom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="name" id="name" class="formInput" placeholder="Nom de l'entrée" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="description">Description de l'entrée</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="description" id="description" class="formInput" placeholder="Description de l'entrée" required="required"></textarea>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="price">Prix</label>
    </div>
    <div class="formGroup">
        <input type="number" name="price" id="nprice" class="formInput" placeholder="Prix de l'entrée" required="required">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Ajouter</button>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');