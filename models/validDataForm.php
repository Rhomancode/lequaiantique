<?php 

//Function de validation et de vérification de champs des formulaires

function validData($datas) {
    $datas = trim($datas);
    $datas = stripcslashes($datas);
    $datas = htmlspecialchars($datas);
    return $datas;
}


//Function de validation et de verification des balises <select><option>
function validSelect($datas) {
    if($datas == '') {
        $datas = NULL;
    } else {
        return $datas;
    }
}
