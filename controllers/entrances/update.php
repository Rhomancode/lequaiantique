<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/entrances/update.php');

require_once('../views/entrances/update.php');

