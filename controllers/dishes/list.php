<?php 

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/dishes/Dishes.php');

$dishes = new Dishes();
$dishes = $dishes->dishesList();

require_once('../views/dishes/list.php');