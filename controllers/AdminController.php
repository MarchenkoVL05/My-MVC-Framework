<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {
    
    public function indexAdminAction() {
        // Можно передавать ничего, либо тему + вью
        $this -> view -> render('blackBG', 'admin');
    }

}

?>