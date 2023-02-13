<?php

require_once('../models/validDataForm.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $detail = $pdo->prepare("SELECT * FROM images WHERE id = :id");
    $detail->bindValue(':id', $id);
    if($detail->execute()) { 
        $imageDetail = $detail->fetch();

        if(!empty($_POST)) {
            //On verifie que tous les champs requis sont remplis
            if(isset($_POST['title'])  && !empty($_POST['title'])) {
            
                //Le formulaire est complet
                $title = validData($_POST['title']);

                require_once('../core/config.php');
                $update = $pdo->prepare('UPDATE images SET title = :title WHERE id = :id');
                $update->bindValue(':id', $id, PDO::PARAM_STR);
                $update->bindValue(":title", $title, PDO::PARAM_STR);
                if($update->execute()) {
                    $messageSuccess = "Le titre de l'image à été modifiée avec succès !";
                }
                
            } else {
                $messageError = "Le formulaire est incomplet";
            }
        }
    } else {
        echo "Il y une erreur";
    }
} else {
    header('Location: /entrees');
}