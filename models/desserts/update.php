<?php

require_once('../models/validDataForm.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $detail = $pdo->prepare("SELECT * FROM desserts WHERE id = :id");
    $detail->bindValue(':id', $id);
    if($detail->execute()) { 
        $dessertDetail = $detail->fetch();

        if(!empty($_POST)) {
            //On verifie que tous les champs requis sont remplis
            if(isset($_POST['name']) && isset($_POST['description'])
            && isset($_POST['price']) && !empty($_POST['name'])
            && !empty($_POST['description']) && !empty($_POST['price'])) {
            
                //Le formulaire est complet
                $name = validData($_POST['name']);
                $description = validData($_POST['description']);
                $price = validData($_POST['price']);
        
                require_once('../core/config.php');
                $update = $pdo->prepare('UPDATE desserts SET name = :name, description = :description, price = :price WHERE id = :id');
                $update->bindValue(':id', $id, PDO::PARAM_STR);
                $update->bindValue(":name", $name, PDO::PARAM_STR);
                $update->bindValue(':description', $description, PDO::PARAM_STR);
                $update->bindValue(':price', $price, PDO::PARAM_INT);
                if($update->execute()) {
                    $messageSuccess = "Le dessert à été modifiée avec succès !";
        
                }
                
            } else {
                $messageError = "Le formulaire est incomplet";
            }
        }
    } else {
        echo "Il y une erreur";
    }
} else {
    header('Location: /desserts');
}