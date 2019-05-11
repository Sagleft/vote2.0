<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";
	require_once __DIR__ . "/../model/Environment.php";
	use FreelandVote\AppConfig;
	use FreelandVote\AppLogic;
	use FreelandVote\Utilities;
	
	$need_login = true;
	$logic = new AppLogic();
	$utils = new Utilities();
	$logic->route($need_login);
	
	$data = [
		'tag'   => $logic->route,
		'user'  => [
			'auth' => $logic->is_auth
		],
		'title' => 'Главная'
	];
	
	$logic->render($data);
	