<?php

session_start();

if($_SESSION['user']['role'] === 'role_admin') {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('../core/config.php');

        $id = $_GET['id'];

        $check = $pdo->prepare("SELECT * FROM images WHERE id = :id");
        $check->bindValue(':id', $id, PDO::PARAM_STR);
        $check->execute(); 
        $checkImage = $check->fetch();

        if(!$checkImage) {
            $messageError = "Cette entrée n'existe pas";
        }

        $delete = $pdo->prepare('DELETE FROM images WHERE id = :id');
        $delete->bindValue(':id', $checkImage['id'], PDO::PARAM_STR);
        if ($delete->execute()) {
            $messageSuccess = "L'image est supprimée";

            header('Location: /images');
        }
    } else {
        header('Location: /404');
    }
} else {
    header('Location: /non-autorisee');
}
