<?php
	namespace FreelandVote;
	
	class AppRender {
		function twigRender($data) {
			$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../view/');
			$twig = new \Twig_Environment($loader, array(
				'cache'       => __DIR__ . '/../view/cache',
				'auto_reload' => true
			));
			exit($twig->render($data['tag'].".tmpl", ['page' => $data]));
		}
	}
	