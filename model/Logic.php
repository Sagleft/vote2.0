<?php
	namespace Vote\Model;
	
	class Logic {
		public $controller = null;
		private $modulesManager = null;
		private $environment = null;
		
		public function __construct() {
			$this->controller     = new \Vote\Controller\LogicController();
			$this->modulesManager = new \Vote\Model\ModulesManager();
			$this->environment    = new \Vote\Model\Environment();
		}
	}
	