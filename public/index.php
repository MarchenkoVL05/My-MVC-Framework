<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;

use app\controllers\MainController;

$app = new Application();

$app -> router -> get('/', 'main');
$app -> router -> get('/contacts', 'main');
$app -> router -> get('/admin', 'admin');

$app -> run();

?>