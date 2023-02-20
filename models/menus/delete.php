<?php

session_start();

if($_SESSION['user']['role'] === 'role_admin') {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('../core/config.php');

        $id = $_GET['id'];

        $check = $pdo->prepare("SELECT * FROM menus WHERE id = :id");
        $check->bindValue(':id', $id, PDO::PARAM_STR);
        $check->execute(); 
        $checkMenu = $check->fetch();

        if(!$checkMenu) {
            $messageError = "Cette entrée n'existe pas";
        }

        $delete = $pdo->prepare('DELETE FROM menus WHERE id = :id');
        $delete->bindValue(':id', $checkMenu['id'], PDO::PARAM_STR);
        if ($delete->execute()) {
            $messageSuccess = "Le menu est supprimée";

            header('Location: /menus');
        }
    } else {
        header('Location: /404');
    }
} else {
    header('Location: /non-autorisee');
}
