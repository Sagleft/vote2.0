<?php
	namespace Vote\Controller;
	
	class LogicController {
		private $coin_connection = null;
		//renderT - чтобы не пересекалось с функцией render
		private $renderT         = null;
		private $user            = null;
		private $modulesManager  = null;
		
		public function __construct() {
			$this->renderT = new \Vote\Controller\Render();
		}
		
		public function set_manager($modulesManager) {
			$this->modulesManager = &$modulesManager;
		}
		
		public function set_user($user) {
			$this->user = &$user;
		}
		
		public function render($data) {
			$this->renderT->twigRender($data);
		}
		
		public function renderModulePage($module_name) {
			//только для модулей, которые Renderable
			$module = $this->modulesManager->getModule($module_name);
			$renderData = $module->controller->getRenderData();
			if($renderData == false) {
				//не вышло запросить данные
				header("Location: /"); exit;
			} else {
				$data = [
					'tag'    => 'module',
					'module' => [
						'name' => $module_name,
						'room' => $renderData['room']
					],
					'title'  => $renderData['title']
				];
				//для модуля User (и варианта шаблона - profile) путь для шаблона будет /view/User/profile.tmpl
				$data[$module_name] = $renderData['data'];
				$this->renderT->twigRender($data);
			}
		}
		
		public function renderPage($tag) {
			$this->renderT->twigRender([
				'tag'  => $tag
			]);
		}
	}
	