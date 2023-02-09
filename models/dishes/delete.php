<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $check = $pdo->prepare("SELECT * FROM dishes WHERE id = :id");
    $check->bindValue(':id', $id, PDO::PARAM_STR);
    $check->execute(); 
    $checkDishe = $check->fetch();

    if(!$checkDishe) {
        $messageError = "Ce plat n'existe pas";
    }

    $delete = $pdo->prepare('DELETE FROM dishes WHERE id = :id');
    $delete->bindValue(':id', $checkDishe['id'], PDO::PARAM_STR);
    if ($delete->execute()) {
        $messageSuccess = "Le plat est supprimé";

        header('Location: /plats');
    }
} else {
    header('Location: /404');
}
