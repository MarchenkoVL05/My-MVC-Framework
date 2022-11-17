<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        $this -> view -> render();
    }

    public function contactsAction() {
        $this -> view -> render();
        $contacts = $this -> model -> getContacts();
        print_r($contacts);
    }
}

?>