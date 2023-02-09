<?php 

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/entrances/Entrances.php');

$entrances = new Entrances();
$entrances = $entrances->entrancesList();

require_once('../views/entrances/list.php');