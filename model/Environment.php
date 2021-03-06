<?php
	namespace App\Model;
	class Environment {
		protected $config = [];
		private $params = [
			'db_host', 'db_user', 'db_password', 'db_name', 'version'
		];
		
		function __construct() {
			$this->loadFromENV();
		}
		
		function loadFromENV(): void {
			$dotenv = \Dotenv\Dotenv::create(__DIR__ . "/../");
			$dotenv->load();
			
			$new_config = [];
			for($i=0; $i<count($this->params); $i++) {
				$param = $this->params [$i];
				$new_config[$param] = getenv($param);
			}
			$this->config = $new_config;
		}
		
		function getResVersion(): int {
			//TOQ: заменить на что-нибудь другое
			return $config['version'];
		}
	}
	