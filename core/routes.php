<?php

$routes = [
    '/' => '../controllers/home.php',
    '/inscription' => '../controllers/subscribe.php',
    '/connexion' => '../controllers/login.php',
    '/profil' => '../controllers/profil.php',
    '/deconnexion' => '../models/disconnect.php',
    '/entree/ajouter' => '../controllers/entrances/add.php',
    '/entrees' => '../controllers/entrances/list.php',
    '/entree/supprimer' => '../controllers/entrances/delete.php',
    "/entree" => '../controllers/entrances/update.php',
    '/404' => '../controllers/404.php',
];