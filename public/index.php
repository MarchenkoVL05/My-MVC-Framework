<?php

// Подключение автозагрузчика классов
require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;
use app\controllers\MainController;
use app\controllers\AdminController;

$app = new Application();

$app -> router -> get('/', MainController::class, 'index');
$app -> router -> get('/contacts', MainController::class, 'contacts');
$app -> router -> get('/admin', AdminController::class, 'indexAdmin');

$app -> run();

?>