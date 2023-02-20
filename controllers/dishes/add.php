<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/dishes/add.php');

require_once('../views/dishes/add.php');