<?php 

session_start();

require_once('../models/entrances/Entrances.php');
require_once('../models/dishes/Dishes.php');
require_once('../models/desserts/Desserts.php');
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

$entrances = new Entrances();
$entrances = $entrances->entrancesList();

$dishes = new Dishes();
$dishes = $dishes->dishesList();

$desserts = new Desserts();
$desserts = $desserts->dessertsList();

require_once('../views/menu.php');
