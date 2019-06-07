<?php
	namespace Vote\Model\Modules;
	
	//логика произвольного пользователя
	class User {
		//контроллер - для работы с текущим пользователем
		private $controller = null;
		
		public function __construct($renderT) {
			$this->controller = new \Vote\Controller\Modules\UserController($renderT);
		}
		
		public function get_controller() {
			return $this->controller;
		}
	}
	