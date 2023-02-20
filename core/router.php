<?php

require_once('../core/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


if(!empty($uri) && $uri !== '/' && $uri[-1] === '/'){
    $uri = substr($uri, 0, -1);

    http_response_code(301);

    header('Location: '.$uri);
}


function abort() {
    http_response_code(404);

    require_once('../controllers/404.php');

    die();
}



if (array_key_exists($uri, $routes)) {
   require $routes[$uri];
} else {
    abort();
}