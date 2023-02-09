<?php 

require_once('../core/connect.php');

class Desserts
{

    use Connect;

    public function dessertsList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT * FROM desserts');
        }
        $desserts = [];
        while ($dessert = $stmt->fetchObject()) {
            $desserts[] = $dessert;
        }

        
        return $desserts;
    }
}