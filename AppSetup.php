<?php

require_once __DIR__ . "/App.php";
require_once __DIR__ . "/ProgramErrorException.php";
require_once __DIR__ . "/Program.php";
require_once __DIR__ . "/Sql.php";
require_once __DIR__ . "/SqlQueryException.php";

class AppSetup {

	public static function run () {
		$settings = App::getSettings();
		$conn = App::getConn($useDb = false);
		if (!$conn) {
			throw new ProgramErrorException("Failed to connect to mysql server");
		}
		Sql::runQuery($conn, "create database if not exists " . Sql::quoteId($settings['database_name']));
		Sql::runQuery($conn, "use " . Sql::quoteId($settings['database_name']));
		Sql::runQuery($conn, "create table if not exists things (
			id bigint not null auto_increment,
			description varchar(255) not null,
			details mediumtext not null,
			due_by datetime not null,
			due_by_timezone varchar(48) not null,
			event_date datetime not null,
			event_date_timezone varchar(48) not null,
			recurrence varchar(64) not null,
			asap tinyint not null default 0,
			date_done bigint null,
			date_created_timestamp bigint not null,
			date_modified_timestamp bigint null,
			primary key (id),
			key date_created_timestamp (date_created_timestamp),
			key description (description),
			key ordering (date_done, due_by, event_date)
		)");
	}

}