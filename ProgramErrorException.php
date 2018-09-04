<?php

class ProgramErrorException extends Exception {
	public function __construct ($msg) {
		$error = error_get_last();
		if (!isset($error)) $extra = "An unknown error occurred";
		else $extra = var_export($error, true);
		$this->message = "$msg: $extra";
	}
}