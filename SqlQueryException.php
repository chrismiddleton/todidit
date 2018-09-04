<?php

class SqlQueryException extends Exception {
	public function __construct ($conn, $query) {
		$this->message = "Error running SQL query.\n\nQuery: $query\n\nError: " . mysqli_error($conn);
	}
}