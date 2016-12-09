<?php

use Application\Controllers\Main;

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '?')){
	$pos = strpos($uri, '?');
	$str = substr($uri, $pos+1);
	$arr = explode('&', $str);
	
	if (strpos($arr[0], '=')){
		$arrCntr = explode('=', $arr[0]);
		$controller = 'Application\\Controllers\\'.ucfirst($arrCntr[1]);
		//var_dump($controller);
	}
	
	if (strpos($arr[1], '=')){
		$arrAct = explode('=', $arr[1]);
		$action = ucfirst($arrAct[1]);
	}
	
	$controller = new $controller();
	//$controller = ( (new $controller()) ? new $controller() : new Main());
	
	//$controller = new Application\Controllers\News();
	//$action = $_GET['action'] ?: 'Index';
	$action = $action ?: 'Index';
	
	//$controller = new News();
}else {
	$controller = new Main();
	$action = 'Index';
}


$controller->action($action);