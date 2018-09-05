<?php

require_once __DIR__ . "/Program.php";
require_once __DIR__ . "/SqlQueryException.php";

class Sql {

	public static function connect ($server, $user, $password, $database = null) {
		$dsn = "mysql:" . (strlen($database) ? "dbname=$database;" : "") . "host=$server";
		return new PDO($dsn, $user, $password);
	}

	public static function fetchAssoc ($statement) {
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public static function quoteId ($id) {
		return "`" . str_replace("`", "``", $id) . "`";
	}
	
	public static function runQuery ($conn, $query, $params = array()) {
		$statement = $conn->prepare($query);
		foreach ($params as $name => $value) {
			$statement->bindParam(":$name", $value, !isset($value) ? 
				PDO::PARAM_NULL : (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
		}
		if (!$statement->execute()) {
			throw new SqlQueryException($conn, $query, $statement);
		}
		return $statement;
	}
	
}