<?php 

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/menus/Menus.php');
$menus = new Menus();
$menus = $menus->menusList();


require_once('../views/menus.php');
