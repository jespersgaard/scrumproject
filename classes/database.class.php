<?php

require_once 'database_config.php';

class Database {

	private $connection;

	function __construct() {
		$this->openConnection();
	}

	private function openConnection() {
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
		if (!$this->connection) {
			die('Database connection failed ' . mysql_error());
		}
		else {
			mysql_select_db(DB_NAME, $this->connection)
				or die('Database selection failed. ' . mysql_error());
		}
	}

	public function insertUserStory($args) {
		if (isset($args['estimated_time']) && !$args['estimated_time']) {
			$args['estimated_time'] = 'NULL';
		}
		$query = "INSERT INTO user_story
			VALUES (NULL, '{$args['name']}', '{$args['description']}', {$args['estimated_time']}, NULL, NOW(), NULL, NULL)";
		mysql_query($query) or die(mysql_error());
	}

	// public function insertProject($args) {
		
	// }
}