<?php

session_start();

if($_SESSION['user']['role'] === 'role_admin') {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('../core/config.php');

        $id = $_GET['id'];

        $check = $pdo->prepare("SELECT * FROM formulaMenu WHERE id = :id");
        $check->bindValue(':id', $id, PDO::PARAM_STR);
        $check->execute(); 
        $checkFormula = $check->fetch();

        if(!$checkFormula) {
            $messageError = "Cette formule de menu n'existe pas";
        }

        $delete = $pdo->prepare('DELETE FROM formulaMenu WHERE id = :id');
        $delete->bindValue(':id', $checkFormula['id'], PDO::PARAM_STR);
        if ($delete->execute()) {
            $messageSuccess = "La formule menu est supprimée";

            header('Location: /formules');
        }
    } else {
        header('Location: /404');
    }
} else {
    header('Location: /non-autorisee');
}