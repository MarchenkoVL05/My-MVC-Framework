<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        echo 'index page';
    }

    public function contactsAction() {
        echo 'contacts page';
    }
}

?>