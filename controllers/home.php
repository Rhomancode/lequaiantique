<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/images/Images.php');
$images = new Images();
$images = $images->imagesList();

require_once('../views/home.php');