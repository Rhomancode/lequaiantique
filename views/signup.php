<?php

$title = "Inscrivez-vous";

ob_start();
?>
<form class="form" action="" method="post">
    <div class="formGroup">
        <label class="formLabel" for="email">Email</label>
    </div>
    <div class="formGroup">
        <input type="email" name="email" id="email" class="formInput" placeholder="Email" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="password">Mot de passe</label>
    </div>
    <div class="formGroup">
        <input type="password" class="formInput" id="password" name="password" placeholder="Mot de passe" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="confirmPassword">Confirmer mot de passe</label>
    </div>
    <div class="formGroup">
        <input type="password" name="confirmPassword" id="confirmPassword" class="formInput" placeholder="Confirmer mot de passe" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="lastName">Nom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="lastName" id="LastName" class="formInput" placeholder="Nom" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="firstName">Prénom</label>
    </div>
    <div class="formGroup">
        <input type="text" name="firstName" id="firstName" class="formInput" placeholder="Prénom" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="phone">Prénom</label>
    </div>
    <div class="formGroup">
        <input type="phone" name="phone" id="phone" class="formInput" placeholder="+33" required="required">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="allergy">Pour vos réservation référencer vos allergies allimentaires ici</label>
    </div>
    <div class="formGroup">
        <textarea type="text" name="allergy" id="allergy" class="formInput" placeholder="Arrachide, gluten" required="required"></textarea>
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">S'inscrire'</button>
    </div>
    <div class="formGroup">
        <a href="#" class="formLink">Déja un compte ? Connectez-vous</a>
    </div>
</form>



<?php
$content = ob_get_clean();
require('layout.php');