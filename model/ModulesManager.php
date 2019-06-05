<?php
	namespace Vote\Model;
	//пока так, чтобы было максимально просто
	class ModulesManager {
		private $modules = [];
		
		public function __construct() {
			$this->modules = [
				new \Vote\Model\Modules\User(),
				//new \Vote\Model\Modules\Vote()
			];
		}
	}
	