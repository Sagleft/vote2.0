<?php
	namespace Vote\Model;
	
	class Logic {
		public  $controller    = null;
		public $modulesManager = null;
		private $environment   = null;
		
		public function __construct() {
			$this->controller     = new \Vote\Controller\LogicController();
			$renderT = $this->controller->get_render();
			$this->modulesManager = new \Vote\Model\ModulesManager($renderT);
			$this->environment    = new \Vote\Model\Environment();
		}
	}
	