<?php 


session_start();
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

            //On récupère les données utilisateurs
            require_once('../core/config.php');
            $check = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $check->bindValue(':email', $email, PDO::PARAM_STR);
            $check->execute();

            $user = $check->fetch();
            //On vérifie que l'utilisateur n'est pas vide
            if(!empty($user)) {
                
                //On vérifie son mot de passe
                if(password_verify($password, $user["password"])) {
                    //On récupère les roles utilisateurs
                    $role = $pdo->prepare('SELECT * FROM `userRoles` JOIN roles ON roles.id = userRoles.roleId WHERE userRoles.userId = :id');
                    $role->bindValue(':id', $user['id']);
                    $role->execute();
                    if($roleUser = $role->fetch()){

                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'lastName' => $user['lastName'],
                            'firstName' => $user['firstName'],
                            'phone' => $user['phone'],
                            'allergy' => $user['allergy'],
                            'role' => $roleUser['name']
                        ];

                        header('location: /');
                    }

                    // $_SESSION['roleUser'] = [
                        // 'role' => $roleUser['name'];
                    // ]
                    
           
                    // $_SESSION['user'] = [
                    // 'id' => $user['id'],
                    // 'email' => $user['email'],
                    //'lastName' => $user['lastName'],
                    //'firstName' => $user['firstName'],
                    //'phone' => $user['phone'],
                    //'allergy' => $user['allergy']
                    //]

                } else {
                    $message = "Le mot de passe est incorrect";
                }

            } else {
                $message = "L'utilisateur et/ou le mot de passe est incorrect";
            }

        } else {
            $message = "Veuillez rentrez un email valide";
        }
    } else {
        $message = "Veuillez saisir tous les champs";
    }
}
