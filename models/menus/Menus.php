<?php 

require_once('../core/connect.php');

class Menus
{

    use Connect;

    public function menusList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT menus.id AS id,menus.name AS name, formula.name AS formula, entrance1.name AS entrance1, 
        entrance2.name AS entrance2, entrance3.name AS entrance3, dishe1.name AS dishe1, dishe2.name AS dishe2, 
        dishe3.name AS dishe3, dessert1.name AS dessert1, dessert2.name AS dessert2, dessert3.name AS dessert3, menus.price AS price
        FROM menus 
                JOIN formulaMenu AS formula ON menus.formula = formula.id 
                JOIN entrances AS entrance1 ON menus.entrance1 = entrance1.id
                LEFT JOIN entrances AS entrance2 ON menus.entrance2 = entrance2.id
                LEFT JOIN entrances AS entrance3 ON menus.entrance3 = entrance3.id
                JOIN dishes AS dishe1 ON menus.dishe1 = dishe1.id
                LEFT JOIN dishes AS dishe2 ON menus.dishe2 = dishe2.id
                LEFT JOIN dishes AS dishe3 ON menus.dishe3 = dishe3.id
                JOIN desserts AS dessert1 ON menus.dessert1 = dessert1.id
                LEFT JOIN desserts AS dessert2 ON menus.dessert2 = dessert2.id
                LEFT JOIN desserts AS dessert3 ON menus.dessert3 = dessert3.id;');
        }
        $menus = [];
        while ($menu = $stmt->fetchObject()) {
            $menus[] = $menu;
        }        
        return $menus;
    }
}