<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/dishes/update.php');

require_once('../views/dishes/update.php');

