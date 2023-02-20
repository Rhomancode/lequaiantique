<?php

require_once('../core/config.php');
require_once('validDataForm.php');

if (!empty($_POST)) {
    if(isset($_POST['email']) && isset($_POST['lastName']) && isset($_POST['firstName']) 
    && isset($_POST['phone']) && isset($_POST['allergy']) && isset($_POST['numberPlace'])
    && isset($_POST['dateReservation']) && isset($_POST['hours'])
    && !empty($_POST['email']) && !empty($_POST['lastName']) && !empty($_POST['firstName']) 
    && !empty($_POST['phone']) && !empty($_POST['numberPlace']) && !empty($_POST['dateReservation'])
    && !empty($_POST['hours'])) {
        
        //Le formulaire est complet
        // On récupère les données en les protégeant
        $email = validData($_POST['email']);
        $lastName = validData($_POST['lastName']);
        $firstName = validData($_POST['firstName']);
        $phone = validData($_POST['phone']);
        $allergy = validData($_POST['allergy']);
        $dateReservation = $_POST['dateReservation'];
        $numberPlace = validData($_POST['numberPlace']);
        $hoursReservation = $_POST['hours'].':00';

        if (isset($_SESSION["user"])) {
            $id = $_SESSION["user"]['id'];

            
            $reservation = $pdo->prepare('INSERT INTO reservation (id, restaurant, dateReservation, user, visitor, numberCover, hoursReservation) VALUES 
            (UUID(), :restaurant, :dateReservation, :user, :visitor, :numberCover, :hoursReservation)');
            $reservation->bindValue(':restaurant', "10c4075e-a30d-11ed-9875-f39927f76100", PDO::PARAM_STR);
            $reservation->bindValue(':dateReservation', $dateReservation);
            $reservation->bindValue(':user', $id, PDO::PARAM_STR);
            $reservation->bindValue(':visitor', NULL, PDO::PARAM_NULL);
            $reservation->bindValue(':numberCover', $numberPlace, PDO::PARAM_INT);
            $reservation->bindValue(':hoursReservation', $hoursReservation, PDO::PARAM_STR);
            if($reservation->execute()) { 
                $messageSuccess = "Réservation réussie nous revenons vers vous par Email et SMS pour vous confirmer votre réservation.";
            }
            else {
                $messageError= "Une erreur s'est produite lors de la réservation veuillez réessayer";
            }
        }
        $newVisitor = $pdo->prepare('INSERT INTO visitor (id, lastName, firstName, email, phone) VALUES 
        (UUID(), :lastName, :firstName, :email, :phone)');
        $newVisitor->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $newVisitor->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $newVisitor->bindValue(':email', $email, PDO::PARAM_STR);
        $newVisitor->bindValue(':phone', $phone, PDO::PARAM_STR);
        if ($newVisitor->execute()) {
            $addVisitor = $newVisitor->fetch();
        } else {
        }
    }
}