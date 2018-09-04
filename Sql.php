<?php

require_once __DIR__ . "/Program.php";
require_once __DIR__ . "/SqlQueryException.php";

class Sql {

	public static function quoteId ($id) {
		return "`" . str_replace("`", "``", $id) . "`";
	}
	
	public static function runQuery ($conn, $query) {
		$result = mysqli_query($conn, $query);
		if (!$result) {
			throw new SqlQueryException($conn, $query);
		}
		return $result;
	}
	
}