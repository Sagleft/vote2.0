<?php
	session_start();
	$_SESSION = [];
	session_destroy();
	//TOQ: можно написать router для переадресации логики,
	//чтобы не плодить много страниц
	header('Location: /');
	