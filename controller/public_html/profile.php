<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";
	//страница профиля текущего пользователя
	$logic = new \App\Model\Logic();
	$logic->controller->renderModulePage('user');
	