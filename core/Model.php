<?php

namespace app\core;

use app\Db\Db;

class Model {

    public $modelName;
    public $params;

    public $db;
    
    public function __construct() {

        $this -> loadDb();
    }

    public function loadDb() {
        $this -> db = new Db();
    }

}

?>