<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/menus/Menus.php');
$menus = new Menus();
$menus = $menus->menusList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/menus/list.php');
} else {
    header('Location: /non-autorisee');
}