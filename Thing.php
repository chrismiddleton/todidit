<?php

require_once __DIR__ . "/App.php";
require_once __DIR__ . "/Sql.php";

class Thing {

	public static function add ($thing) {
		$conn = App::getConn();
		$result = Sql::runQuery($conn, "INSERT INTO things SET description = :description", $thing);
	}

	public static function getAll () {
		$conn = App::getConn();
		$statement = Sql::runQuery($conn, "SELECT * FROM things");
		$things = array();
		while ($thing = Sql::fetchAssoc($statement)) {
			$things[] = $thing;
		}
		return $things;
	}

}