<?php

namespace app\core;

class View {

    protected $content;

    public $params;
    public $viewName;

    public function __construct($viewName, $params) {
        $this -> params = $params;
        $this -> viewName = $viewName;
    }

    public function render($template = "default", $view = "") {
        // Если вью передано, то загружай её, иначе загрузи вью с таким же именем как у контроллера
        if ($view) {
            $this -> loadView($view, $this -> params, $template);
        } else {
            $this -> loadView($this -> viewName, $this -> params, $template);
        }
    }

    
    public function loadView($view, $params, $template) {
        ob_start();
        include(__DIR__ . "/../views/" . $view . ".php");
        $content = ob_get_clean();

        $layoutPath = __DIR__ . "/../views/layouts/" . $template . ".php";

        // Если переданный шаблон не существует, то загрузи дефолтный
        if (file_exists($layoutPath)) {
            include(__DIR__ . "/../views/layouts/" . $template . ".php");
        } else {
            include(__DIR__ . "/../views/layouts/default.php");
        }
    }

    public function redirect($url) {
        header("Location: " . $url);
        exit;
    }

    public static function Error($code) {
        http_response_code($code);

        $path = __DIR__ . "/../views/errors/" . $code . ".php";
        if ($path) {
            include(__DIR__ . "/../views/errors/" . $code . ".php");
        } else {
            View::Error(404);
        }

    }

}

?>