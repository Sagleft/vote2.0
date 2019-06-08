<?php
	namespace Vote\Controller;
	
	class LogicController {
		//renderT - чтобы не пересекалось с функцией render
		private $renderT         = null;
		private $user            = null;
		private $modulesManager  = null;
		
		public function __construct() {
			$this->renderT = new \Vote\Controller\Render();
		}
		
		//TOQ: типизацию аргумента сделать лаконичнее
		public function set_manager(\Vote\Model\ModulesManager $modulesManager): void {
			$this->modulesManager = &$modulesManager;
		}
		
		public function set_user(UserController $user): void {
			$this->user = &$user;
		}
		
		public function render(array $data): void {
			$this->renderT->twigRender($data);
		}
		
		public function renderModulePage($module_name): void {
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
		
		public function renderPage($tag): void {
			$this->renderT->twigRender([
				'tag'  => $tag
			]);
		}
	}
	