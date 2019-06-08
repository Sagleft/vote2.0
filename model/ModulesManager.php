<?php
	namespace Vote\Model;
	//пока так, чтобы было максимально просто
	class ModulesManager {
		private $modules = [];
		
		public function __construct($renderT = null) {
			//составляем массив модулей
			$this->modules = [
				'user' => new \Vote\Model\Modules\User($renderT)
			];
		}
		
		public function getModule($name) {
			return $this->modules[$name];
		}
	}
	