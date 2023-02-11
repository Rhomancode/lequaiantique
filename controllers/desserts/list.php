<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/desserts/Desserts.php');

$desserts = new Desserts();
$desserts = $desserts->dessertsList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/desserts/list.php');
} else {
    header('Location: /non-autorisee');
}