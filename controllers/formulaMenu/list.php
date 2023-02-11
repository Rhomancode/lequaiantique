<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/formulaMenu/formulaMenus.php');
$formulas = new formulasMenu();
$formulas = $formulas->formulasMenuList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/formulaMenu/list.php');
} else {
    header('Location: /non-autorisee');
}