<?php 

//Function de validation et de vérification de champs des formulaires

function validData($datas) {
    $datas = trim($datas);
    $datas = stripcslashes($datas);
    $datas = htmlspecialchars($datas);
    return $datas;
}
