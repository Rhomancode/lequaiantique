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
    '/plat/ajouter' => '../controllers/dishes/add.php',
    '/plats' => '../controllers/dishes/list.php',
    '/plat/supprimer' => '../controllers/dishes/delete.php',
    "/plat" => '../controllers/dishes/update.php',
    '/dessert/ajouter' => '../controllers/desserts/add.php',
    '/desserts' => '../controllers/desserts/list.php',
    '/dessert/supprimer' => '../controllers/desserts/delete.php',
    "/dessert" => '../controllers/desserts/update.php',
    '/formule/ajouter' => '../controllers/formulaMenu/add.php',
    '/formules' => '../controllers/formulaMenu/list.php',
    '/formule/supprimer' => '../controllers/formulaMenu/delete.php',
    "/formule" => '../controllers/formulaMenu/update.php',
    '/404' => '../controllers/404.php',
    '/la-carte' => '../controllers/menu.php',
    '/non-autorisee' => '../controllers/unauthorized.php',
    '/image/ajouter' => '../controllers/images/add.php',
    '/images' => '../controllers/images/list.php',
    '/image/supprimer' => '../controllers/images/delete.php',
    '/image' => '../controllers/images/update.php',
];

