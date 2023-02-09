<?php 


require_once('../models/validDataForm.php');

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
        $insert = $pdo->prepare('INSERT INTO desserts(id, name, description, price) VALUES (UUID(), :name, :description, :price)');
        $insert->bindValue(":name", $name, PDO::PARAM_STR);
        $insert->bindValue(':description', $description, PDO::PARAM_STR);
        $insert->bindValue(':price', $price, PDO::PARAM_INT);
        if($insert->execute()) {
            $messageSuccess = "Le dessert à été ajoutée avec succès !";

        }
        
    } else {
        $messageError = "Le formulaire est incomplet";
    }
}