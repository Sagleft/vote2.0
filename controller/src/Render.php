<?php
	namespace Vote\Controller;
	//для отображения страниц и их элементов
	//на основе twig-шаблонов и полученных данных
	class Render {
		private $data_wrap = [
			'page'    => [],
			'version' => 1
		];
		
		public function __construct($data = []) {
			$this->data_wrap = ['page' => $data, 'version' => getenv('version')];
		}
		
		function prepareRender() {
			$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../view/');
			$twig = new \Twig_Environment($loader, [
				'cache'       => __DIR__ . '/../../view/cache',
				'auto_reload' => true //TODO: сделать переменной
			]);
			exit($twig->render($this->data_wrap['page']['tag'] . ".tmpl", $this->data_wrap));
		}
		
		function twigRender($data = null) {
			if($data != null) {
				$this->data_wrap = ['page' => $data, 'version' => getenv('version')];
			}
			$this->prepareRender();
		}
	}
	