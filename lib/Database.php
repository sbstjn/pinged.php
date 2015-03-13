<?php

namespace Ping;

class Database {
	public static function init() {
		$db = new Database(getenv('HEROKU_POSTGRESQL_WHITE_URL'));
		
		return $db->connect();
	}
	
	public function __construct($url) {
		$this->url = $url;
	}
	
	public function run($query) {
		\pg_query($this->connection, $query);
	}
	
	public function connect() {
		$data = parse_url($this->url);
		$this->connection = \pg_connect('user=' . $data['user'] . ' password=' . $data['pass'] . ' host=' . $data['host'] . ' dbname=' . substr($data['path'], 1));
		
		return $this;
	}
}