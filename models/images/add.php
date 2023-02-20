<?php 
session_start();

require_once('../models/validDataForm.php');

if($_SESSION['user']['role'] === 'role_admin') {
    if(!empty($_POST)){
        if(isset($_FILES) && isset($_POST['title'])
        && !empty($_FILES) && !empty($_POST['title'])) {

            $title = validData($_POST['title']);

            //On récupère le nom de l'image
            $tmpDir = $_FILES['image']['tmp_name'];
            $siteDir = 'assets/images/img_bdd/'.$_FILES['image']['name'];
            $moveToDir = move_uploaded_file($tmpDir, $siteDir);

            if($moveToDir) {
                require_once('../core/config.php');

                $insert = $pdo->prepare('INSERT INTO images (id, title, img) VALUES (UUID(), :title, :img)');
                $insert->bindValue(':title', $title);
                $insert->bindValue('img', $_FILES['image']['name']);
                if($insert->execute()) {
                    $messageSuccess = "L'image d'accueil à été ajouté avec succès";
                } else {
                    $messageError = "Impossible d'ajouter cette image";
                }
            }

        } else {
            var_dump($_FILES);
            var_dump($_POST);
            //$messageError = "Le formulaire est incomplet";
            //C:\Users\Roman\AppData\Local\Temp\phpB796.tmp" ["error"]
        }
    }
} else {

    header('Location: /non-autorisee');
}