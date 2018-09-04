<?php

require_once __DIR__ . "/ProgramErrorException.php";

class App {

	private static $conn = null;
	private static $settings = null;
	
	public static function getConn () {
		if (!isset(self::$conn)) {
			$settings = self::getSettings();
			self::$conn = mysqli_connect($settings['database_server'], $settings['database_user'], $settings['database_password'], $settings['database_name']);
		}
		return self::$conn;
	}

	public static function getSettings () {
		if (!isset(self::$settings)) {
			$contents = file_get_contents(__DIR__ . "/settings.json");
			if (!$contents) {
				throw new ProgramErrorException("Empty settings.json");
			}
			$settings = json_decode($contents, true);
			if (!is_array($settings)) {
				throw new ProgramErrorException("Invalid settings.json");
			}
			self::$settings = $settings;
		}
		return self::$settings;
	}
	
}
