<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";
	//страница профиля текущего пользователя
	$logic = new \Vote\Model\Logic();
	//TOQ: всё это перекинуть в Logic
	$user_module = $logic->modulesManager->getModule('user');
	$user_module->pageLogic();
	