<?php

require_once('../core/connect.php');

class Hours
{

    use Connect;

    public function hoursList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT dayOfWeek, lunchOpening, lunchClosing, dinerOpening, dinerClosing FROM hoursOpening');
        }
        $hours = [];
        while ($hour = $stmt->fetchObject()) {
            $hours[] = $hour;
        }

        
        return $hours;
    }
}