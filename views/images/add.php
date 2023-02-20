<?php

$title = "Ajouter une image d'accueil";

ob_start();
if (!empty($messageError)) { ?>
    <p class="errorMessage"><?php echo $messageError ?></p>
<?php }
if (!empty($messageSuccess)) { ?>
    <p class="successMessage"><?php echo $messageSuccess ?></p>
<?php }
?>
<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
    <div class="formGroup">
        <label class="formLabel" for="image">Image d'accueil</label>
    </div>
    <div class="formGroup">
        <input type="file" name="image" id="image" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="title">Titre de l'image d'accueil</label>
    </div>
    <div class="formGroup">
        <input type="text" name="title" id="title" class="formInput" placeholder="Titre de l'image d'accueil" required="required">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Ajouter</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/images'>Retour à la liste des images d'accueil</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');