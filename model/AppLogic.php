<?php
	namespace FreelandVote;
	
	class AppLogic {
		protected $config_instance;
		protected $render_instance;
		
		public $route = "main";
		public $is_auth = false;
		
		function __construct() {
			$this->config_instance = new AppConfig();
			$this->render_instance = new AppRender();
			if(isset($_SESSION['uid'])) {
				$this->is_auth = true;
			} else {
				$this->is_auth = false;
			}
		}
		
		function route($need_login) {
			switch($this->route) {
				default:
					$this->route = 'main';
					break;
				case 'main':
					if($need_login) {
						if(! $this->is_auth) {
							$this->route = 'login';
						}
					}
					break;
			}
		}
		
		function render($params) {
			$this->render_instance->twigRender($params);
		}
	}
	