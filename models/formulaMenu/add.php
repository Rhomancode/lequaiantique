<?php 
session_start();

require_once('../models/validDataForm.php');

if($_SESSION['user']['role'] === 'role_admin') {

    if(!empty($_POST)) {
        //On verifie que tous les champs requis sont remplis
        if(isset($_POST['name']) && !empty($_POST['name'])) {
        
            //Le formulaire est complet
            $name = validData($_POST['name']);

            require_once('../core/config.php');
            $insert = $pdo->prepare('INSERT INTO formulaMenu (name) VALUES (:name)');
            $insert->bindValue(":name", $name, PDO::PARAM_STR);
            if($insert->execute()) {
                $messageSuccess = "La formule du menu à été ajoutée avec succès !";
            }
            
        } else {
            $messageError = "Le formulaire est incomplet";
        }
    }
} else {

    header('Location: /non-autorisee');
}