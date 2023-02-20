<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/desserts/update.php');

require_once('../views/desserts/update.php');

