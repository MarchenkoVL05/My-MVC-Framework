<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

    public function getContacts() {
        $result = $this -> db -> getAll("SELECT * FROM contacts");
        return $result;
    }
}

?>