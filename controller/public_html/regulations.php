<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";
	
	$logic = new \Vote\Model\Logic();
	$logic->controller->renderPage('info', ['route' => 'regulations']);
	