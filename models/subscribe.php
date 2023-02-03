<?php 

require_once('../core/config.php');


if(!empty($_POST)){
//On verifie que tous les champs requis soit remplis
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) 
    && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['phone']) && isset($_POST['allergy'])
    && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']) 
    && !empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['phone'])) {
        
        //Le formulaire est complet
        // On récupère les données en les protégeant
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $confirmPassword = strip_tags($_POST['confirmPassword']);
        $lastName = strip_tags($_POST['lastName']);
        $firstName = strip_tags($_POST['firstName']);
        $phone = strip_tags($_POST['phone']);
        $allergy = strip_tags($_POST['allergy']);

        $check = $pdo->prepare('SELECT email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if($password == $confirmPassword) {
                    $password = password_hash($password, PASSWORD_BCRYPT);

                    $insert = $pdo->prepare('INSERT INTO users (id, email, password, lastName, firstName, phone, allergy) VALUES (UUID(), :email, :password, :lastName, :firstName, :phone, :allergy)');
                    $insert->execute(array(
                        'email' => $email,
                        'password' => $password,
                        'lastName' => $lastName,
                        'firstName' => $firstName,
                        'phone' => $phone,
                        'allergy' => $allergy
                    ));
                    die ("Inscription réussi");
                } else {
                    die ("Les mots de passes saisie ne correspondent pas");
                }
            } else {
                die("Le mail est invalide");
            }
        } else {
            die('Une compte avec cette email existe déja');
        }
    } else {
        die('Le formulaire est incomplet');
    }
}