<?php

namespace app\core;

class Controller {

    public $vmName;
    public $params;

    public View $view;
    public Model $model;

    function __construct($vmName, $params) {

        $this -> vmName = $vmName;
        $this -> params = $params;

        $this -> view = new View($this -> vmName, $this -> params);
    }

}

?>