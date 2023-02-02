<?php

require_once('models/hoursOpening.php');

$hoursOpening = new Hours();
$hoursOpening = $hoursOpening->hoursList(); 

require_once('views/layout.php');