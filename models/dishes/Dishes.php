<?php 

require_once('../core/connect.php');

class Dishes
{

    use Connect;

    public function dishesList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT * FROM dishes');
        }
        $dishes = [];
        while ($dishe = $stmt->fetchObject()) {
            $dishes[] = $dishe;
        }

        
        return $dishes;
    }
}