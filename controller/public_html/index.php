<?php
	require_once __DIR__ . "/../vendor/autoload.php";
	
	$enviro = new \Vote\Model\Environment();
	$render = new \Vote\Controller\Render([
		'tag'  => 'home'
	]);
	$render->twigRender();
	