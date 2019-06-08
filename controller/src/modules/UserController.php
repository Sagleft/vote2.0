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
		
		public function getRenderData() {
			if($this->is_auth) {
				return [
					'title'  => 'Мой профиль',
					'room'   => 'profile',
					'data' => [
						'uid'       => $this->uid,
						'nick_name' => $this->nick_name,
						'language'  => $this->language
					]
				];
			} else {
				return false;
			}
		}
	}
	