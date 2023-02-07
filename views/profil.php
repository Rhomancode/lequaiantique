<?php

session_start();

$title = "Vos informations";

ob_start();

if (!empty($message)) { ?>
    <p class="errorMessage"><?php echo $message ?></p>
<?php } ?>
<form class="form" id="form" action="" method="post">
    <div class="formGroup">
        <label class="formLabel" for="email">Email</label>
    </div>
    <div class="formGroup">
        <input type="email" name="email" id="email" class="formInput" value='<?= $_SESSION['user']['email'] ?>'>
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="lastName">Nom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="lastName" id="lastName" class="formInput" value="<?= $_SESSION['user']['lastName'] ?>">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="firstName">Prénom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="firstName" id="firstName" class="formInput" value="<?= $_SESSION['user']['firstName'] ?>">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="phone">Téléphone</label>
    </div>
    <div class="formGroup">
        <input type="phone" name="phone" id="phone" class="formInput" value="<?= $_SESSION['user']['phone'] ?>">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="allergy">Pour vos réservation référencer vos allergies allimentaires ici (Facultatif)</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="allergy" id="allergy" class="formInput" value="<?= $_SESSION['user']['allergy'] ?>"></textarea>
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Modifier</button>
    </div>
</form>

<?php
$content = ob_get_clean();
require('layout.php');