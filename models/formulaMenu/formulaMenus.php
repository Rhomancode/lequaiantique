<?php 

require_once('../core/connect.php');

class FormulasMenu
{

    use Connect;

    public function formulasMenuList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT * FROM formulaMenu');
        }
        $formulas = [];
        while ($formula = $stmt->fetchObject()) {
            $formulas[] = $formula;
        }

        
        return $formulas;
    }
}