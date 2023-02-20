<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/dishes/Dishes.php');

$dishes = new Dishes();
$dishes = $dishes->dishesList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/dishes/list.php');
} else {
    header('Location: /non-autorisee');
}