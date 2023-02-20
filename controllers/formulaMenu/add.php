<?php

require_once('../models/hoursOpening.php');


$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/formulaMenu/add.php');

require_once('../views/formulaMenu/add.php');