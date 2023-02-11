<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/entrances/Entrances.php');
$entrances = new Entrances();
$entrances = $entrances->entrancesList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/entrances/list.php');
} else {
    header('Location: /non-autorisee');
}