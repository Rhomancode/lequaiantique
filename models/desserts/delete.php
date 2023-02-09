<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $check = $pdo->prepare("SELECT * FROM desserts WHERE id = :id");
    $check->bindValue(':id', $id, PDO::PARAM_STR);
    $check->execute(); 
    $checkDessert = $check->fetch();

    if(!$checkDessert) {
        $messageError = "Ce dessert n'existe pas";
    }

    $delete = $pdo->prepare('DELETE FROM desserts WHERE id = :id');
    $delete->bindValue(':id', $checkDessert['id'], PDO::PARAM_STR);
    if ($delete->execute()) {
        $messageSuccess = "Le dessert est supprimé";

        header('Location: /desserts');
    }
} else {
    header('Location: /404');
}
