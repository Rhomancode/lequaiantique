<?php 

require_once('../core/config.php');
require_once('validDataForm.php');


if(!empty($_POST)) {
//On verifie que tous les champs requis soit remplis
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword']) 
    && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['phone']) && isset($_POST['allergy'])
    && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']) 
    && !empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['phone'])) {
        
        //Le formulaire est complet
        // On récupère les données en les protégeant
        $email = validData($_POST['email']);
        $password = validData($_POST['password']);
        $confirmPassword = validData($_POST['confirmPassword']);
        $lastName = validData($_POST['lastName']);
        $firstName = validData($_POST['firstName']);
        $phone = validData($_POST['phone']);
        $allergy = validData($_POST['allergy']);

        //Verification dans la base si l'email n'est pas déja connu
        $check = $pdo->prepare('SELECT email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0) {
            //Vérification adresse mail valide
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                //Vérification de la longueur des champs
                if (strlen($lastName) <= 50
                    && preg_match("^[A-Za-z '-]+$^", $lastName)
                    && strlen($firstName) <= 50
                    && preg_match("^[A-Za-z '-]+$^", $lastName)){
                        //Vérification du téléphone
                        if (strlen($phone) <= 10
                        && preg_match("^[0-9]+$^", $phone)){
                            //Vérification du mot de passe
                            if ($password == $confirmPassword) {
                                $password = password_hash($password, PASSWORD_ARGON2ID);
                                //Requete d'insertion de l'utilisateur dans la base
                                $insert = $pdo->prepare('INSERT INTO users(id, email, password, lastName, firstName, phone, allergy) 
                                VALUES (UUID(), :email, :password, :lastName, :firstName, :phone, :allergy)');
                                $insert->bindValue(":email", $email);
                                $insert->bindValue(":password", $password);
                                $insert->bindValue(":lastName", $lastName);
                                $insert->bindValue(":firstName", $firstName);
                                $insert->bindValue(":phone", $phone);
                                $insert->bindValue(":allergy", $allergy);
                                //Insertion dans la base
                                $insert->execute();
                                $message= "Inscription réussi";    
                            } else {
                                $message = "Les mots de passe ne correspondent pas";
                            }
                        } else {
                            $message = "Le numéro de téléphone est invalide";
                        }
                    } else {
                        $message = "Veuillez ne saisir que des lettres dans les champs Nom et Prénom";
                    }
            } else {
                $message = "L'adresse Email est incorrect";
            }
        } else {
            $message = "Un compte avec cette adresse mail existe déja !";
        }
    } else {
        $message = "Le formulaire est incomplet";
    }
}