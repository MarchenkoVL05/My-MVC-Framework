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
        $find = false;

        foreach ($this -> routes as $route => $routeInfo) {

            if ($path === $route) {
                $find = true;
                [$controllerName, $action] = $routeInfo;

                // vmName = view-model Name
                $vmName = str_replace('app\controllers\\', '', $controllerName);
                $vmName = str_replace('Controller', '', $vmName);
                $vmName = strtolower($vmName);

                if ($controllerName) {
                    $controller = new $controllerName($vmName, $params);
                } else {
                    View::Error(404);
                }

                if ($action) {
                    $action = $action . "Action";
                } else {
                    View::Error(404);
                }
                $controller -> $action();
            }
        }

        if (!$find) {
            View::Error(404);
        }
    }
}

?>