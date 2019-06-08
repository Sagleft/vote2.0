<?php
	namespace Vote\Model;
	
	class Logic {
		public  $controller    = null;
		public $modulesManager = null;
		private $environment   = null;
		
		public function __construct() {
			//переменные среды
			$this->environment    = new \Vote\Model\Environment();
			//контроллер
			$this->controller     = new \Vote\Controller\LogicController();
			//менеджер модулей
			$this->modulesManager = new \Vote\Model\ModulesManager($renderT);
			//передаем ссылку на менеджер модулей в контроллер
			$this->controller->set_manager($this->modulesManager);
		}
	}
	