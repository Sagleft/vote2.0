<?php
	namespace Vote\Model;
	//пока так, чтобы было максимально просто
	class ModulesManager {
		private $modules = [];
		
		public function __construct($renderT = null) {
			//составляем массив модулей
			//и передаем им ссылку на render (!!)
			//Call-time pass-by-reference has been removed
			$this->modules = [
				'user' => new \Vote\Model\Modules\User($renderT)
			];
		}
		
		public function getModule($name) {
			return $this->modules[$name];
		}
	}
	