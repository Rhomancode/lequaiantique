<?php

require_once('../models/hoursOpening.php');

$hours = new Hours();
$hours = $hours->hoursList(); 

require_once('../models/subscribe.php');

require_once('../views/subscribe.php');