<?php

session_start();

$title = "Modifier le titre de l'image d'accueil";

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
        <label class="formLabel" for="images">Image</label>
    </div>
    <div class="formGroup">
        <image class= "imageBddDetail" src="assets/images/img_bdd/<?= $imageDetail['img']?>">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="title">Titre de l'image</label>
    </div>
    <div class="formGroup">
        <input type="text" name="title" id="title" class="formInput" placeholder="Titre de l'image d'accueil" required="required" value='<?= $imageDetail['title']?>'>
        <input type="hidden" value="<?= $imageDetail['id']?>">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Modifier</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/images'>Retour à la liste d'images</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');