<?php

require_once('../models/hoursOpening.php');
require_once('../models/reservation.php');

$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../views/reservation.php');