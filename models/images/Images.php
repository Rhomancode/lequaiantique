<?php 

require_once('../core/connect.php');

class Images
{

    use Connect;

    public function imagesList()
    {
        if (!is_null($this->pdo)) {
        $stmt = $this->pdo->query('SELECT * FROM images');
        }
        $images = [];
        while ($image = $stmt->fetchObject()) {
            $images[] = $image;
        }

        
        return $images;
    }
}