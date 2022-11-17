<?php

namespace app\core;

class View {

    public $controllerName;
    protected $layouts = "default";
    protected $content;
    
    public function __construct($controllerName) {
        $this -> controllerName = $controllerName;
    }

    public function render($view) {
        $this -> loadView($view);
    }

    
    public function loadView($view) {
        ob_start();
        include(__DIR__ . "/../views/" . $view . ".php");
        $content = ob_get_clean();

        include(__DIR__ . "/../views/layouts/" . $this -> layouts . ".php");
    }

}

?>