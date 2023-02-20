<?php

session_start();

if($_SESSION['user']['role'] === 'role_admin') {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('../core/config.php');

        $id = $_GET['id'];

        $check = $pdo->prepare("SELECT * FROM entrances WHERE id = :id");
        $check->bindValue(':id', $id, PDO::PARAM_STR);
        $check->execute(); 
        $checkEntrance = $check->fetch();

        if(!$checkEntrance) {
            $messageError = "Cette entrée n'existe pas";
        }

        $delete = $pdo->prepare('DELETE FROM entrances WHERE id = :id');
        $delete->bindValue(':id', $checkEntrance['id'], PDO::PARAM_STR);
        if ($delete->execute()) {
            $messageSuccess = "Produit supprimé";

            header('Location: /entrees');
        }
    } else {
        header('Location: /404');
    }
} else {
    header('Location: /non-autorisee');
}
