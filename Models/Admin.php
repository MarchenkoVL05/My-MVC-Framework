<?php

namespace app\models;

use app\core\Model;

class Admin extends Model {

    public function getContacts() {
        $result = $this -> db -> fetchAll("SELECT * FROM contacts");
        return $result;
    }
}

?>