<?php

namespace app\services;

class CurrentUrl {

    protected $url;

    public function __construct($url) {
        $this -> url = $url;
    }

    public function getPath() {
        $currentPath = $this -> url;
        $position = strpos($this -> url, '?');
        if ($position) {
            $currentPath = substr($this -> url, 0, $position);
        }

        return $currentPath;
    }

    public function getParams() {
        $position = strpos($this -> url, '?');
        if ($position) {
            $params = substr($this -> url, $position + 1);
        } else {
            $params= '';
        }
        return $params;
    }
}

?>