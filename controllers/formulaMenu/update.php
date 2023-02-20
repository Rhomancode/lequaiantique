<?php
require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 


require_once('../models/formulaMenu/update.php');

require_once('../views/formulaMenu/update.php');
