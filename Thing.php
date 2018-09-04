<?php

require_once __DIR__ . "/App.php";
require_once __DIR__ . "/Sql.php";

class Thing {

	public static function getAll () {
		$conn = App::getConn();
		$result = Sql::runQuery($conn, "SELECT * FROM things");
		$things = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$things[] = $thing;
		}
		return $things;
	}

}