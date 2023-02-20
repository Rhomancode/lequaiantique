<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/desserts/Desserts.php');

$entrances = new Entrances();
$entrances = $entrances->entrancesList();

require_once('../models/dessert/delete.php');

require_once('../views/dessert/list.php');
