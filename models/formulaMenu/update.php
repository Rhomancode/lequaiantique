<?php

require_once('../models/validDataForm.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $detail = $pdo->prepare("SELECT * FROM formulaMenu WHERE id = :id");
    $detail->bindValue(':id', $id);
    if($detail->execute()) { 
        $formulaDetail = $detail->fetch();

        if(!empty($_POST)) {
            //On verifie que tous les champs requis sont remplis
            if(isset($_POST['name']) && !empty($_POST['name'])) {
            
                //Le formulaire est complet
                $name = validData($_POST['name']);
        
                require_once('../core/config.php');
                $update = $pdo->prepare('UPDATE formulaMenu SET name = :name WHERE id = :id');
                $update->bindValue(':id', $id, PDO::PARAM_STR);
                $update->bindValue(":name", $name, PDO::PARAM_STR);
                if($update->execute()) {
                    $messageSuccess = "La formule de menu à été modifiée avec succès !";
        
                }
                
            } else {
                $messageError = "Le formulaire est incomplet";
            }
        }
    } else {
        echo "Il y une erreur";
    }
} else {
    header('Location: /formules');
}