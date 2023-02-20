<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/dishes/Dishes.php');

$entrances = new Entrances();
$entrances = $entrances->entrancesList();

require_once('../models/dishes/delete.php');

require_once('../views/dishes/list.php');

