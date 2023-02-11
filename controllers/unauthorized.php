<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../views/unauthorized.php');