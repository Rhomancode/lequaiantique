<?php 

try {

    $pdo = null;

    $pdo = new PDO('mysql:dbname=u112463479_lequaiantique;host=sql932.main-hosting.eu;charset=utf8', 'u112463479_admin', 'Test31@"&');
} catch (PDOException $e) {
    echo $e;
}