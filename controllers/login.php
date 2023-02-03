<?php

require_once('../models/hoursOpening.php');

$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/connexion.php');

require_once('../views/login.php');