<?php

$title = "Connectez-vous";

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
        <input type="password" name="password" id="password" class="formInput" placeholder="Mot de passe" required="required">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Se connecter</button>
    </div>
    <div class="formGroup">
    <a href="/inscription" class="formLink">Inscrivez-vous</a>
    <a href="#" class="formLink">Mot de passe oublié</a>
    </div>
</form>



<?php
$content = ob_get_clean();
require('layout.php');