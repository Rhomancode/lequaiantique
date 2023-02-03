<?php 

require_once('connect.php');

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['lastName']) && isset($_POST['fistName']) && isset($_POST['phone'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $phone = htmlspecialchars($_POST['phone']);
    $allergy = htmlspecialchars($_POST['allergy']);

    $check = $pdo->prepare('SELECT email, password FROM users WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 0) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($password == $confirmPassword) {
                $password = hash('sha256', $password);
                $ip = $_SERVER['REMOTE_ADDR'];

                $insert = $pdo->prepare('INSERT INTO users (id, email, password, lastName, firstName, phone, allergy) VALUES (UUID(), :email, :password, :lastName, :firstName, :phone, :allergy)');
                $insert->execute(array(
                    'email' => $email,
                    'password' => $password,
                    'lastName' => $lastName,
                    'firstName' => $firstName,
                    'phone' => $phone,
                    'allergy' => $allergy
                ));
                echo "Inscription réussie";
            } else echo "Echec de l'inscription";
        } else echo "Email non valide";
    } else echo "Un compte existe déja";
}