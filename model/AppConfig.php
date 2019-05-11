<?php
	namespace FreelandVote;
	class AppConfig {
		protected $config = [];
		private $params = [
			'db_host', 'db_user', 'db_password', 'db_name'
		];
		
		function __construct() {
			$this->loadFromENV();
		}
		
		function loadFromENV() {
			$new_config = [];
			for($i=0; $i<count($this->params); $i++) {
				$param = $this->params [$i];
				$new_config[$param] = getenv($param);
			}
			$this->config = $new_config;
		}
	}
	