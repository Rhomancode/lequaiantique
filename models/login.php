<?php 

require_once('validDataForm.php');

//Verification d'envoi du formulaire
if (!empty($_POST)){
    //Le formule est envoyée
    //On verifie que les champs requis soit remplis
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = validData($_POST['email']);
        $password = validData($_POST['password']);

        //On verifie que l'email est un email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            require_once('../core/config.php');
            $check = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $check->bindValue(':email', $email, PDO::PARAM_STR);
            $check->execute();

            $user = $check->fetch();

            if(!$user) {
                $message= "L'utilisateur et/ou le mot de passe est incorrect";
            }

            if(!password_verify($password, $user['password'])){
                $message= "L'utilisateur et/ou le mot de passe est incorrect";
            }

            session_start();

            $_SESSION['user'] = [
                "id" => $user['id'],
                "email" => $user['email'],
                "lastName" => $user['lastName'],
                "firstName" => $user['firstName'],
                "phone" => $user['phone'],
                "allergy" => $user['allergy']
            ];

            $message = "Bienvenue ".$user['lastName']. ' '.$user['firstName'];

        } else {
            $message = "Veuillez rentrez un email valide";
        }
    } else {
        $message = "Veuillez saisir tous les champs";
    }
}
