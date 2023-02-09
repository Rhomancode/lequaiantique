<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('../core/config.php');

    $id = $_GET['id'];

    $detail = $pdo->prepare("SELECT * FROM entrances WHERE id = :id");
    $detail->bindValue(':id', $id);
    if($detail->execute()) { 
        $entranceDetail = $detail->fetch();
    } else {
        echo "Il y une erreur";
    }
} else {
    header('Location: /entrees');
}