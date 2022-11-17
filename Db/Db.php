<?php

namespace app\Db;

use PDO;

class Db {

    public $link;

    public function __construct() {
        $config = require_once "config.php";

        try {
            $this -> link = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
        } catch (PDOException $e) {
            die($e -> getMessage());
        }
    }

    public function query($sql, $params = []) {

		$stmt = $this -> link -> prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt -> bindValue(':' . $key, $val);
			}
		}
		$stmt -> execute();
        return $stmt;
	}

    public function getAll($sql, $params = []) {
        $result = $this -> query($sql, $params);
        $result = $result -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>