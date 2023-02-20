<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/desserts/add.php');

require_once('../views/desserts/add.php');