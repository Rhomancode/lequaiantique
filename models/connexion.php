<?php 
session_start();

require_once('../core/config.php');


if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $check = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $check->execute(); 
    $data = $check->fetch(PDO::FETCH_ASSOC);

    echo $data['password'];

    if ($data === false) {
        if(password_verify($password, $data['password'])){
            $_SESSION['user'] = $data['firstName'];
        }else {
            die ('Mot de passe invalide');
        }
    } else {
        die('Aucun compte trouver');
    }
}else {    
}