<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/entrances/add.php');

require_once('../views/entrances/add.php');