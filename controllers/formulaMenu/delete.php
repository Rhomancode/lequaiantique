<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/formulaMenu/formulaMenus.php');

$formulas = new FormulasMenu();
$formulas = $formulas->formulasMenuList();

require_once('../models/formulaMenu/delete.php');

require_once('../views/formulaMenu/list.php');