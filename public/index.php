<?php

require_once('../core/routes.php');

$uri = $_SERVER['REQUEST_URI'];

if(!empty($uri) && $uri !== '/' && $uri[-1] === '/'){
    $uri = substr($uri, 0, -1);

    http_response_code(301);

    header('Location: '.$uri);
}


if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}