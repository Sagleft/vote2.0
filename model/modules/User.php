<?php
	namespace Vote\Model\Modules;
	
	//логика произвольного пользователя
	class User {
		public $name = "User"; //название модуля, не менять
		//контроллер - для работы с текущим пользователем
		private $controller = null;
		
		public function __construct($renderT) {
			$this->controller = new \Vote\Controller\Modules\UserController($renderT);
		}
		
		public function pageLogic() {
			$this->controller->showUserPage();
		}
	}
	