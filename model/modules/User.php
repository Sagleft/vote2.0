<?php
	namespace Vote\Model\Modules;
	
	//логика произвольного пользователя
	class User {
		public $name = "User"; //название модуля, не менять
		//контроллер - для работы с текущим пользователем
		public $controller = null;
		
		public function __construct(Render $renderT = null) {
			if($renderT == null) {
				$this->controller = new \Vote\Controller\Modules\UserController();
			} else {
				$this->controller = new \Vote\Controller\Modules\UserController($renderT);
			}
		}
	}
	