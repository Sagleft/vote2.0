<?php
	namespace App\Model\Modules;
	
	class MFCoin {
		public $controller = null;
		public function __construct() {
			$this->controller = new \App\Controller\Modules\MFCoinController();
		}
	}
	