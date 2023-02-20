<?php 
session_start();

require_once('../models/validDataForm.php');

if($_SESSION['user']['role'] === 'role_admin') {

    if(!empty($_POST)) {
        //On verifie que tous les champs requis sont remplis
        if(isset($_POST['name']) && isset($_POST['formula'])
        && isset($_POST['entrance1']) && isset($_POST['entrance2'])
        && isset($_POST['entrance3']) && isset($_POST['dishe1'])
        && isset($_POST['dishe2']) && isset($_POST['dishe3'])
        && isset($_POST['dessert1']) && isset($_POST['dessert2'])
        && isset($_POST['dessert3']) && !empty($_POST['name'])
        && !empty($_POST['formula']) && !empty($_POST['entrance1'])
        && !empty($_POST['dishe1']) && !empty($_POST['dessert1']) 
        && isset($_POST['price']) && !empty($_POST['price'])) {
        
            //Le formulaire est complet
            $name = validData($_POST['name']);
            $formula = validSelect($_POST['formula']);
            $entrance1 = validSelect($_POST['entrance1']);
            $entrance2 = validSelect($_POST['entrance2']);
            $entrance3 = validSelect($_POST['entrance3']);
            $dishe1 = validSelect($_POST['dishe1']);
            $dishe2 = validSelect($_POST['dishe2']);
            $dishe3 = validSelect($_POST['dishe3']);
            $dessert1 = validSelect($_POST['dessert1']);
            $dessert2 = validSelect($_POST['dessert2']);
            $dessert3 = validSelect($_POST['dessert3']);
            $price = validData($_POST['price']);

            require_once('../core/config.php');

            $insert = $pdo->prepare('INSERT INTO menus 
            (id, name, formula, entrance1, entrance2, entrance3, dishe1, dishe2, dishe3,
            dessert1, dessert2, dessert3, price) 
            VALUES (UUID(), :name, :formula, :entrance1, :entrance2, :entrance3, :dishe1, 
            :dishe2, :dishe3, :dessert1, :dessert2, :dessert3, :price)');
            $insert->bindValue(":name", $name, PDO::PARAM_STR);
            $insert->bindValue(":formula", $formula, PDO::PARAM_STR);
            $insert->bindValue(":entrance1", $entrance1, PDO::PARAM_STR);
            if ($entrance2 === "NULL"){
                $insert->bindValue(":entrance2", $entrance2, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":entrance2", $entrance2, PDO::PARAM_STR);
            }
            if ($entrance3 == "NULL"){
                $insert->bindValue(":entrance3", $entrance3, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":entrance3", $entrance3, PDO::PARAM_STR);
            }
            $insert->bindValue(":dishe1", $dishe1, PDO::PARAM_STR);
            if ($dishe2 === "NULL"){
                $insert->bindValue(":dishe2", $dishe2, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":dishe2", $dishe2, PDO::PARAM_STR);
            }
            if ($dishe3 === "NULL"){
                $insert->bindValue(":dishe3", $dishe3, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":dishe3", $dishe3, PDO::PARAM_STR);
            }
            $insert->bindValue(":dessert1", $dessert1, PDO::PARAM_STR);
            if ($dessert2 === "NULL"){
                $insert->bindValue(":dessert2", $dessert2, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":dessert2", $dessert2, PDO::PARAM_STR);
            }
            if ($dessert3 === "NULL"){
                $insert->bindValue(":dessert3", $dessert3, PDO::PARAM_NULL);
            } else {
                $insert->bindValue(":dessert3", $dessert3, PDO::PARAM_STR);
            }
            $insert->bindValue(':price', $price, PDO::PARAM_INT);
            if($insert->execute()) {
                $messageSuccess = "Le menu à été ajoutée avec succès !";

            } else {
                $messageError = "Veuillez saisir et selectionner les champs obligatoires";
            }
            
        } else {
            $messageError = "Le formulaire est incomplet";
        }
    }
} else {

    header('Location: /non-autorisee');
}