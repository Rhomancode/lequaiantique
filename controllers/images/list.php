<?php 

session_start();
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/images/Images.php');
$images = new Images();
$images = $images->imagesList();

if($_SESSION['user']['role'] === 'role_admin') {
    require_once('../views/images/list.php');
} else {
    header('Location: /non-autorisee');
}