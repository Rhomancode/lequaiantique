<?php

$title = "Inscrivez-vous";

ob_start();
if (!empty($message)) { ?>
    <p class="errorMessage"><?php echo $message ?></p>
<?php } ?>
<form class="form" id="form" action="" method="post">
    <div class="formGroup">
        <label class="formLabel" for="email">Email</label>
    </div>
    <div class="formGroup">
        <input type="email" name="email" id="email" class="formInput" placeholder="Email">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="password">Mot de passe</label>
    </div>
    <div class="formGroup">
        <input type="password" class="formInput" id="password" name="password" placeholder="Mot de passe">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="confirmPassword">Confirmer mot de passe</label>
    </div>
    <div class="formGroup">
        <input type="password" name="confirmPassword" id="confirmPassword" class="formInput" placeholder="Confirmer mot de passe">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="lastName">Nom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="lastName" id="lastName" class="formInput" placeholder="Nom">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="firstName">Prénom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="firstName" id="firstName" class="formInput" placeholder="Prénom">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="phone">Téléphone</label>
    </div>
    <div class="formGroup">
        <input type="phone" name="phone" id="phone" class="formInput" placeholder="+33">
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="allergy">Pour vos réservation référencer vos allergies allimentaires ici (Facultatif)</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="allergy" id="allergy" class="formInput" placeholder="Arrachide, gluten"></textarea>
        <div class="error"></div>
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">S'inscrire</button>
    </div>
    <div class="formGroup">
        <a href="/connexion" class="formLink">Déja un compte ? Connectez-vous</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('layout.php');