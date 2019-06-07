<?php
	namespace Vote\Controller\Modules;
	
	//для работы с текущим пользователем
	class UserController {
		public $nick_name  = "Anonymous";
		public $uid        = 0;
		public $status     = "guest";
		public $first_name = "Anon";
		public $last_name  = "Ymous";
		public $language   = "ru";
		public $is_auth    = false;
		
		private $renderT = null;
		
		public function __construct($renderT) {
			$this->renderT = &$renderT;
			//проверяем, авторизован ли
			if(!isset($_SESSION['uid'])) {
				$this->is_auth = false;
			} else {
				if($_SESSION['uid'] > 0) {
					//TOQ: можно сделать другую проверку
					$this->is_auth = true;
				}
			}
		}
		
		public function auth_request() {
			//запрос авторизации через OAUTH
			//TODO, а пока через test_auth
		}
		
		public function showUserPage() {
			if($this->is_auth) {
				//TODO: сделать общую обертку для шаблонов модулей
				$this->renderT->twigRender([
					'tag'    => 'module',
					'module' => [
						'name' => 'User', 'room' => 'profile'
					],
					'title'  => 'Мой профиль',
					'user'   => [
						'uid'       => $this->uid,
						'nick_name' => $this->nick_name,
						'is_auth'   => $this->is_auth
					],
					'lang'  => $this->language
				]);
			} else {
				//не авторизованы
				//TOQ: можно сделать иначе
				header("Location: /");
			}
		}
	}
	