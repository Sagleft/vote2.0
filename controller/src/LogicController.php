<?php
	namespace App\Controller;
	
	class LogicController {
		//renderT - чтобы не пересекалось с функцией render
		private $renderT         = null;
		private $user_controller = null;
		private $modulesManager  = null;
		
		public function __construct() {
			$this->renderT = new \App\Controller\Render();
		}
		
		//TOQ: типизацию аргумента сделать лаконичнее
		public function set_manager(\App\Model\ModulesManager $modulesManager): void {
			$this->modulesManager = &$modulesManager;
		}
		
		public function set_user(UserController $user): void {
			$this->user_controller = &$user;
		}
		
		public function render(array $data): void {
			$this->renderT->twigRender($data);
		}
		
		public function renderModulePage(string $module_name): void {
			//только для модулей, которые Renderable
			$module = $this->modulesManager->getModule($module_name);
			$renderData = $module->controller->getRenderData();
			if($renderData == false) {
				//не вышло запросить данные
				header("Location: /"); exit;
			} else {
				$data = [
					"tag"    => "module",
					"module" => [
						"name" => $module_name,
						"room" => $renderData["room"]
					],
					"title"  => $renderData["title"]
				];
				//для модуля User (и варианта шаблона - profile) путь для шаблона будет /view/User/profile.tmpl
				$data[$module_name] = $renderData['data'];
				$this->renderT->twigRender($data);
			}
		}
		
		public function renderPage(string $tag, $data = []): void {
			$user_data = [];
			$renderData = $this->modulesManager->getModule("user")->controller->getRenderData();
			if($renderData = false) {
				$user_data = [
					'is_auth' => false
				];
			} else {
				//если авторизованы, передаем представлению
				//данные текущего пользователя
				$user_data = $renderData["data"];
			}
			//page.user.is_auth возвращает true в случае,
			//если авторизован
			$this->renderT->twigRender([
				"tag"   => $tag,
				"title" => "Freeland Vote",
				"user"  => $user_data,
				"data"  => $data
			]);
		}
	}
	