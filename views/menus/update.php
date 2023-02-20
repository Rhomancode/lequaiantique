<?php

$title = "Modifier le menu";

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
        <label class="formLabel" for="name">Nom du menu</label>
    </div>
    <div class="formGroup">
        <input type="text" name="name" id="name" class="formInput" placeholder="Nom du menu" required="required" value="<?= $idDetailMenu['name']?>">
    </div>
    <div class="formGroup">
        <label class="formLabel" for="formula">Formule du Menu</label>
    </div>
    <div class="formGroup">
        <select class="formInput" name="formula" id="formula-select">
            <option class="optionDefault" value='<?= $idDetailMenu['formula']?>'><?= $menuDetail['formula']?></option>
            <?php foreach ($formulas as $formula): ?>
                <option value="<?= $formula->id ?>"><?= $formula->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formGroup">
        <label class="formLabel">Les entrées</label>
    </div>
    <div class="formGroup">
        <select class="formInput" name="entrance1" id="entrance-select1" required="required">
            <option class="optionDefault" value="<?= $idDetailMenu['entrance1']?>"><?= $menuDetail['entrance1']?></option>
            <?php foreach ($entrances as $entrance): ?>
                <option value="<?= $entrance->id ?>"><?= $entrance->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="entrance2" id="entrance-select2">
            <option class="optionDefault" value="<?= $idDetailMenu['entrance2']?>"><?= $menuDetail['entrance2']?></option>
            <?php foreach ($entrances as $entrance): ?>
                <option value="<?= $entrance->id ?>"><?= $entrance->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="entrance3" id="entrance-select3">
            <option class="optionDefault" value="<?= $idDetailMenu['entrance3']?>"><?= $menuDetail['entrance3']?></option>
            <?php foreach ($entrances as $entrance): ?>
                <option value="<?= $entrance->id ?>"><?= $entrance->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <label class="formLabel">Les plats</label>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dishe1" id="dishe-select1" required="required">
            <option class="optionDefault" value="<?= $idDetailMenu['dishe1']?>"><?= $menuDetail['dishe1']?></option>
            <?php foreach ($dishes as $dishe): ?>
                <option value="<?= $dishe->id ?>"><?= $dishe->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dishe2" id="dishe-select2">
            <option class="optionDefault" value="<?= $idDetailMenu['dishe2']?>"><?= $menuDetail['dishe2']?></option>
            <?php foreach ($dishes as $dishe): ?>
                <option value="<?= $dishe->id ?>"><?= $dishe->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dishe3" id="dishe-select3">
            <option class="optionDefault" value="<?= $idDetailMenu['dishe3']?>"><?= $menuDetail['dishe3']?></option>
            <?php foreach ($dishes as $dishe): ?>
                <option value="<?= $dishe->id ?>"><?= $dishe->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <label class="formLabel">Les desserts</label>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dessert1" id="dessert-select1" required="required">
            <option class="optionDefault" value="<?= $idDetailMenu['dessert1']?>"><?= $menuDetail['dessert1']?></option>
            <?php foreach ($desserts as $dessert): ?>
                <option value="<?= $dessert->id ?>"><?= $dessert->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dessert2" id="dessert-select2">
            <option class="optionDefault" value="<?= $idDetailMenu['dessert2']?>"><?= $menuDetail['dessert2']?></option>
            <?php foreach ($desserts as $dessert): ?>
                <option value="<?= $dessert->id ?>"><?= $dessert->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <select class="formInput" name="dessert3" id="dessert-select3">
            <option class="optionDefault" value="<?= $idDetailMenu['dessert3']?>"><?= $menuDetail['dessert3']?></option>
            <?php foreach ($desserts as $dessert): ?>
                <option value="<?= $dessert->id ?>"><?= $dessert->name ?></option>
            <?php endforeach; ?>
            <option value=""></option>
        </select>
    </div>
    <div class="formGroup">
        <label class="formLabel" for="price">Prix</label>
    </div>
    <div class="formGroup">
        <input type="number" name="price" id="price" class="formInput" placeholder="Prix du menu" required="required" value="<?= $idDetailMenu['price']?>">
    </div>
    <div class="formGroup">
        <button type="submit" class="formBtn">Modifier</button>
    </div>
    <div class="formGroup">
        <a class="addButton" href='/menus'>Retour à la liste des menus</a>
    </div>
</form>

<?php
$content = ob_get_clean();
require('../views/layout.php');