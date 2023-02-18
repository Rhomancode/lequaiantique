<?php
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="../script/script.js"></script>
<script src="../script/reservationScript.js"></script>
<?php
$title = "Réserver votre table";

session_start();

ob_start();
if (isset($_SESSION["user"])) {
    if (!empty($messageError)) { ?>
        <p class="errorMessage"><?php echo $messageError ?></p>
    <?php }
    if (!empty($messageSuccess)) { ?>
        <p class="successMessage"><?php echo $messageSuccess ?></p>
    <?php }
    ?>
    <form class="form" id="form" action="" method="post">
        <div class="formGroup">
            <label class="formLabel" for="lastName">Nom</label>
        </div>
        <div class="formGroup">
            <input type="hidden" name="id" id="id" value='<?= $_SESSION['user']['id'] ?>'>
            <input type="text" name="lastName" id="lastName" class="formInput" placeholder="Nom" required="required" value='<?= $_SESSION['user']['lastName'] ?>'>
        </div>
        <div class="formGroup">
            <label class="formLabel" for="firstName">Prénom</label>
        </div>
        <div class="formGroup">
            <input type="text" name="firstName" id="firstName" class="formInput" placeholder="Prénom" required="required" value='<?= $_SESSION['user']['firstName'] ?>'>
        </div>
        <div class="formGroup">
            <label class="formLabel" for="email">Email</label>
        </div>
        <div class="formGroup">
            <input type="email" name="email" id="email" class="formInput" placeholder="Email" required="required" value='<?= $_SESSION['user']['email'] ?>'>
        </div>
        <div class="formGroup">
            <label class="formLabel" for="phone">Téléphone</label>
        </div>
        <div class="formGroup">
            <input type="phone" name="phone" id="phone" class="formInput" placeholder="Téléphone" required="required" value='<?= $_SESSION['user']['phone'] ?>'>
        </div>
        <div class="formGroup">
        <label class="formLabel" for="allergy">Référencez vos allergies allimentaires (Facultatif)</label>
        </div>
        <div class="formGroup">
        <textarea type="text" name="allergy" id="allergy" class="formInput" placeholder="Exemple: Arrachide, gluten"><?= $_SESSION['user']['allergy'] ?></textarea>
        </div>
        <div class="formGroup">
        <label class="formLabel" for="numberPlace">Nombre de couverts</label>
        </div>
        <div class="formGroup">
            <select class="formInput" name="numberPlace" id="numberPlace-select">
                <option value="">Selectionner le nombre de couverts</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="formGroup">
        <label class="formLabel" for="date">Date</label>
        </div>
        <div class="formGroup">
            <input class="formInput" type="text" id="datepicker" name="dateReservation" value="">
        </div>
        <div class="formGroup">
            <p class="errorMessage" id="infoReservation">Aucune réservations possible le lundi et le mardi</p>
            <div class = "reservationCheck" id="reservationCheck">
                <div class= "btnSelectLunch" id="lunch">
                    Midi
                </div>
                <div class="selectContentLunch" id="select-container-lun">
                    <div id="radiolunchSun">
                        <label for="radio-29">11h00</label>
                        <input class="select" type="radio" name="hours" id="radio-29" value="11:00">
                        <label for="radio-30">11h15</label>
                        <input class="select" type="radio" name="hours" id="radio-30" value="11:15">
                        <label for="radio-31">11h30</label>
                        <input class="select" type="radio" nam21e="hours" id="radio-31" value="11:30">
                        <label for="radio-32">11h45</label>
                        <input class="select" type="radio" name="hours" id="radio-32" value="11:45">
                    </div>
                    <label for="radio-15">12h00</label>
                    <input class="select" type="radio" name="hours" id="radio-15" value="12:00">
                    <label for="radio-16">12h15</label>
                    <input class="select" type="radio" name="hours" id="radio-16" value="12:15">
                    <label for="radio-17">12h30</label>
                    <input class="select" type="radio" name="hours" id="radio-17" value="12:30">
                    <label for="radio-18">12h45</label>
                    <input class="select" type="radio" name="hours" id="radio-18" value="12:45">
                    <label for="radio-19">13h00</label>
                    <input class="select" type="radio" name="hours" id="radio-19" value="13:00">
                    <label for="radio-20">13h15</label>
                    <input class="select" type="radio" name="hours" id="radio-20" value="13:15">
                    <label for="radio-21">13h30</label>
                    <input class="select" type="radio" name="hours" id="radio-21" value="13:30">
                    <div id="radiolunchSun">
                        <label for="radio-25">13h45</label>
                        <input class="select" type="radio" name="hours" id="radio-25" value="13:45">
                        <label for="radio-26">14h00</label>
                        <input class="select" type="radio" name="hours" id="radio-26" value="14:00">
                    </div>
                </div>
                
                <div class= "btnSelectDiner" id="diner">
                    Soir
                </div>
                <div class="selectContentDiner" id="select-container-din">
                    <label for="radio-1">18h30</label>
                    <input class="select" type="radio" name="hours" id="radio-1" value="18:30">
                    <label for="radio-2">18h45</label>
                    <input class="select" type="radio" name="hours" id="radio-2" value="18:45">
                    <label for="radio-3">19h00</label>
                    <input class="select" type="radio" name="hours" id="radio-3" value="19:00">
                    <label for="radio-4">19h15</label>
                    <input class="select" type="radio" name="hours" id="radio-4" value="19:15">
                    <label for="radio-5">19h30</label>
                    <input class="select" type="radio" name="hours" id="radio-5" value="19:30">
                    <label for="radio-6">19h45</label>
                    <input class="select" type="radio" name="hours" id="radio-6" value="19:45">
                    <label for="radio-7">19h45</label>
                    <input class="select" type="radio" name="hours" id="radio-7" value="19:45">
                    <label for="radio-8">20h00</label>
                    <input class="select" type="radio" name="hours" id="radio-8" value="20:00">
                    <label for="radio-9">20h15</label>
                    <input class="select" type="radio" name="hours" id="radio-9" value="20:15">
                    <label for="radio-10">20h30</label>
                    <input class="select" type="radio" name="hours" id="radio-10" value="20:30">
                    <label for="radio-11">20h45</label>
                    <input class="select" type="radio" name="hours" id="radio-11" value="20:45">
                    <label for="radio-12">21h00</label>
                    <input class="select" type="radio" name="hours" id="radio-12" value="21:00">
                    <label for="radio-13">21h15</label>
                    <input class="select" type="radio" name="hours" id="radio-13" value="21:15">
                    <label for="radio-14">21h30</label>
                    <input class="select" type="radio" name="hours" id="radio-14" value="21:30">
                    <div id="radiodinSat">
                        <label for="radio-27">21h45</label>
                        <input class="select" type="radio" nam21e="hours" id="radio-27" value="21:45">
                        <label for="radio-28">22h00</label>
                        <input class="select" type="radio" name="hours" id="radio-28" value="22:00">
                    </div>
                </div>
            </div> 
        </div>
        <div class="formGroup">
            <button type="submit" class="formBtn">Réserver</button>
        </div>
    </form>
    <?php
} else {
    if (!empty($messageError)) { ?>
        <p class="errorMessage"><?php echo $messageError ?></p>
    <?php }
    if (!empty($messageSuccess)) { ?>
        <p class="successMessage"><?php echo $messageSuccess ?></p>
    <?php }
    ?>
    <form class="form" id="form" action="" method="post">
        <div class="formGroup">
            <label class="formLabel" for="lastName">Nom</label>
        </div>
        <div class="formGroup">
            <input type="text" name="lastName" id="lastName" class="formInput" placeholder="Nom" required="required">
        </div>
        <div class="formGroup">
            <label class="formLabel" for="firstName">Prénom</label>
        </div>
        <div class="formGroup">
            <input type="text" name="firstName" id="firstName" class="formInput" placeholder="Prénom" required="required">
        </div>
        <div class="formGroup">
            <label class="formLabel" for="email">Email</label>
        </div>
        <div class="formGroup">
            <input type="email" name="email" id="email" class="formInput" placeholder="Email" required="required">
        </div>
        <div class="formGroup">
            <label class="formLabel" for="phone">Téléphone</label>
        </div>
        <div class="formGroup">
            <input type="phone" name="phone" id="phone" class="formInput" placeholder="Téléphone" required="required">
        </div>
        <div class="formGroup">
        <label class="formLabel" for="allergy">Référencez vos allergies allimentaires (Facultatif)</label>
        </div>
        <div class="formGroup">
        <textarea type="text" name="allergy" id="allergy" class="formInput" placeholder="Arrachide, gluten"></textarea>
        </div>
        <div class="formGroup">
        <label class="formLabel" for="numberPlace">Nombre de couverts</label>
        </div>
        <div class="formGroup">
            <select class="formInput" name="numberPlace" id="numberPlace-select">
                <option value="">Selectionner le nombre de couverts</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <div class="formGroup">
        <label class="formLabel" for="date">Date</label>
        </div>
        <div class="formGroup">
            <input class="formInput" type="date" id="date" name="dateReservation">
        </div>
        <div class="formGroup">
            <button type="submit" class="formBtn">Réserver</button>
        </div>
    </form>
    <?php
}
$content = ob_get_clean();
require('layout.php');