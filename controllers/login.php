<?php

require_once('../models/hoursOpening.php');

$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/login.php');

require_once('../views/login.php');