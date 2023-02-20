<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/formulaMenu/formulaMenus.php');
$formulas = new FormulasMenu();
$formulas = $formulas->formulasMenuList();

require_once('../models/entrances/Entrances.php');
$entrances = new Entrances();
$entrances = $entrances->entrancesList();

require_once('../models/dishes/Dishes.php');
$dishes = new Dishes();
$dishes = $dishes->dishesList();

require_once('../models/desserts/Desserts.php');
$desserts = new Desserts();
$desserts = $desserts->dessertsList();

require_once('../models/images/update.php');

require_once('../views/images/update.php');

