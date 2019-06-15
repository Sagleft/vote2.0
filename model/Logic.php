<?php
	namespace App\Model;
	
	class Logic {
		public  $controller    = null;
		public $modulesManager = null;
		private $environment   = null;
		
		public function __construct() {
			//переменные среды
			$this->environment    = new \App\Model\Environment();
			//контроллер
			$this->controller     = new \App\Controller\LogicController();
			//менеджер модулей
			$this->modulesManager = new \App\Model\ModulesManager($renderT);
			//передаем ссылку на менеджер модулей в контроллер
			$this->controller->set_manager($this->modulesManager);
		}
	}
	