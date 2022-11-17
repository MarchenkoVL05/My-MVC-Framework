<?php

namespace app\core;

use app\models;

abstract class Controller {

    public $vmName;
    public $params;

    public View $view;
    public $model;

    public function __construct($vmName, $params) {

        $this -> vmName = $vmName;
        $this -> params = $params;

        $this -> view = new View($this -> vmName, $this -> params);

        $this -> model = $this -> loadModel();
    }

    public function loadModel() {
        $t = "app\models\\" . ucfirst($this -> vmName);
        return new $t();
    }

}

?>