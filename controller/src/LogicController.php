<?php
	namespace Vote\Controller;
	
	class LogicController {
		private $coin_connection = null;
		private $renderT = null;
		
		public function __construct() {
			$this->renderT = new \Vote\Controller\Render();
		}
		
		public function render($data) {
			$this->renderT->twigRender($data);
		}
		
		public function renderPage($tag) {
			$this->renderT->twigRender(['tag' => $tag]);
		}
	}
	