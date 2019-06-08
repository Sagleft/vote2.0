<?php
	namespace Vote\Controller;
	
	class LogicController {
		private $coin_connection = null;
		//renderT - чтобы не пересекалось с функцией render
		private $renderT = null;
		
		public function __construct() {
			$this->renderT = new \Vote\Controller\Render();
		}
		
		//public function get_render() {
		//	return $this->renderT;
		//}
		
		public function render($data) {
			$this->renderT->twigRender($data);
		}
		
		public function renderModulePage($module, $renderData) {
			$this->renderT->twigRender([
				'tag'    => 'module',
				'module' => [
					'name' => $module->name, 'room' => $renderData['room']
				],
				'title'  => 'Мой профиль',
				'user'   => [
					'uid'       => $this->uid,
					'nick_name' => $this->nick_name,
					'is_auth'   => $this->is_auth
				],
				'lang'  => $this->language
			]);
		}
		
		public function renderPage($tag) {
			$this->renderT->twigRender([
				'tag'  => $tag
			]);
		}
	}
	