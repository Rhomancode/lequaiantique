<?php

require_once('models/hoursOpening.php');

$title= "Bienvenue sur votre site web";

$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('views/layout.php');