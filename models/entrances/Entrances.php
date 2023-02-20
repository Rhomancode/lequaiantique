<?php 

require_once('../core/connect.php');

class Entrances
{

    use Connect;

    public function entrancesList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT * FROM entrances');
        }
        $entrances = [];
        while ($entrance = $stmt->fetchObject()) {
            $entrances[] = $entrance;
        }

        
        return $entrances;
    }
}