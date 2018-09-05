<?php

class SqlQueryException extends Exception {
	public function __construct ($conn, $query, $statement) {
		$this->message = "Error running SQL query.\n\nQuery: $query\n\nError: " . json_encode($statement->errorInfo());
	}
}