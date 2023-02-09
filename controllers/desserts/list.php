<?php 

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/desserts/Desserts.php');

$desserts = new Desserts();
$desserts = $desserts->dessertsList();

require_once('../views/desserts/list.php');