<?php

namespace app\core;

use app\services\CurrentUrl;

class Router {

    protected array $routes;
    protected $currentUrl;

    public function __construct() {
        $this -> currentUrl = new CurrentUrl($_SERVER["REQUEST_URI"]);
    }

    public function get(string $route, $controller, $action) {
        $this -> routes[$route] = [$controller, $action];
    }

    public function resolve() {
        $path = $this -> currentUrl -> getPath();
        $params = $this -> currentUrl -> getParams();
        
        $this -> callController($path, $params);
    }

    public function callController($path, $params) {
        foreach ($this -> routes as $route => $routeInfo) {
            if ($path === $route) {
                [$controllerName, $action] = $routeInfo;
                $controller = new $controllerName();

                $action = $action . "Action";
                $controller -> $action();
            }
        }
    }
}

?>