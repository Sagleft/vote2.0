<?php
	namespace Vote\Model\Modules;
	
	class MFCoin {
		public $controller = null;
		public function __construct() {
			$this->controller = new \Vote\Controller\Modules\MFCoinController();
		}
	}
	