<?php

session_start();
require_once('../models/validDataForm.php');


if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $detail = $pdo->prepare('SELECT menus.id AS id, menus.name AS name, formula.name AS formula, entrance1.name AS entrance1, 
    entrance2.name AS entrance2, entrance3.name AS entrance3, dishe1.name AS dishe1, dishe2.name AS dishe2, 
    dishe3.name AS dishe3, dessert1.name AS dessert1, dessert2.name AS dessert2, dessert3.name AS dessert3, menus.price AS price
    FROM menus 
            JOIN formulaMenu AS formula ON menus.formula = formula.id 
            JOIN entrances AS entrance1 ON menus.entrance1 = entrance1.id
            LEFT JOIN entrances AS entrance2 ON menus.entrance2 = entrance2.id
            LEFT JOIN entrances AS entrance3 ON menus.entrance3 = entrance3.id
            JOIN dishes AS dishe1 ON menus.dishe1 = dishe1.id
            LEFT JOIN dishes AS dishe2 ON menus.dishe2 = dishe2.id
            LEFT JOIN dishes AS dishe3 ON menus.dishe3 = dishe3.id
            JOIN desserts AS dessert1 ON menus.dessert1 = dessert1.id
            LEFT JOIN desserts AS dessert2 ON menus.dessert2 = dessert2.id
            LEFT JOIN desserts AS dessert3 ON menus.dessert3 = dessert3.id
            WHERE menus.id = :id');
    $detail->bindValue(':id', $id);
    if($detail->execute()) { 
        $menuDetail = $detail->fetch();

        //On récupère les ID de chaque clés étrangères de la table
        $getId = $pdo->prepare('SELECT * FROM menus WHERE id = :id');
        $getId->bindValue(':id', $id, PDO::PARAM_STR);
        if ($getId->execute()) {
            $idDetailMenu = $getId->fetch();

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
                    
        
                    $update = $pdo->prepare('UPDATE menus SET name = :name, formula = :formula, entrance1 = :entrance1,
                    entrance2 = :entrance2, entrance3 = :entrance3, dishe1 = :dishe1, dishe2 = :dishe2, dishe3 = :dishe3,
                    dessert1 = :dessert1, dessert2 = :dessert2, dessert3 = :dessert3, price = :price WHERE id = :id');
                    $update->bindValue(':id', $id, PDO::PARAM_STR);
                    $update->bindValue(":name", $name, PDO::PARAM_STR);
                    $update->bindValue(":formula", $formula, PDO::PARAM_STR);
                    $update->bindValue(":entrance1", $entrance1, PDO::PARAM_STR);
                    if ($entrance2 == "" || $entrance2 == NULL){
                        $update->bindValue(":entrance2", $entrance2, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":entrance2", $entrance2, PDO::PARAM_STR);
                    }
                    if ($entrance3 == "" || $entrance3 == NULL){
                        $update->bindValue(":entrance3", $entrance3, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":entrance3", $entrance3, PDO::PARAM_STR);
                    }
                    $update->bindValue(":dishe1", $dishe1, PDO::PARAM_STR);
                    if ($dishe2 == "" || $dishe2 == NULL){
                        $update->bindValue(":dishe2", $dishe2, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":dishe2", $dishe2, PDO::PARAM_STR);
                    }
                    if ($dishe3 == "" || $dishe3 == NULL){
                        $update->bindValue(":dishe3", $dishe3, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":dishe3", $dishe3, PDO::PARAM_STR);
                    }
                    $update->bindValue(":dessert1", $dessert1, PDO::PARAM_STR);
                    if ($dessert2 == "" || $dessert2 == NULL){
                        $update->bindValue(":dessert2", $dessert2, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":dessert2", $dessert2, PDO::PARAM_STR);
                    }
                    if ($dessert3 == "" || $dessert3 == NULL){
                        $update->bindValue(":dessert3", $dessert3, PDO::PARAM_NULL);
                    } else {
                        $update->bindValue(":dessert3", $dessert3, PDO::PARAM_STR);
                    }
                    $update->bindValue(':price', $price, PDO::PARAM_INT);
                    if($update->execute()) {
                        $messageSuccess = "Le menu à été modifié avec succès !";
                    } else {
                        $messageError = "Le menu n'as pas pu être modifié";
                    }
                }
            }
        }
    } else {
        echo "Il y une erreur";
    }
} else {
    header('Location: /menus');
}