<?php 

trait Connect
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:dbname=u112463479_lequaiantique;host=sql932.main-hosting.eu;charset=utf8', 'u112463479_admin', 'Test31@"&');
            echo "Connexion à la base réussi !";
        } catch (PDOException $e) {
            echo "Impossible de se connecter à la base de données";
        }
    }
}