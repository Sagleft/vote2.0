<?php
	namespace Vote\Controller;
	
	class LogicController {
		private $coin_connection = null;
		//renderT - чтобы не пересекалось с функцией render
		private $renderT = null;
		
		public function __construct() {
			$this->renderT = new \Vote\Controller\Render();
		}
		
		public function get_render() {
			return $this->renderT;
		}
		
		public function render($data) {
			$this->renderT->twigRender($data);
		}
		
		public function renderPage($tag) {
			//TODO: убрать или изменить эту функцию
			$this->renderT->twigRender([
				'tag'  => $tag
			]);
		}
	}
	