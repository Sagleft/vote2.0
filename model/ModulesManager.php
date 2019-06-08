<?php
	namespace Vote\Model;
	//пока так, чтобы было максимально просто
	class ModulesManager {
		private $modules = [];
		
		public function __construct(Render $renderT = null) {
			//составляем массив модулей
			$this->modules = [
				'user' => new \Vote\Model\Modules\User($renderT),
				'mfcoin' => new \Vote\Model\Modules\MFCoin()
			];
		}
		
		public function getModule($name) {
			//TOQ: создать абстрактный класс модуля,
			//от которого будут наследоваться все модули,
			//а затем добавить типизацию к этой функции
			return $this->modules[$name];
		}
	}
	