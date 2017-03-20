<?php

use Application\Controllers\Main;

require __DIR__ . '/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
//----По сути это код Роутера

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
		$action = ($arrAct[1]) ? ucfirst($arrAct[1]) : '';
	}
	
	try{
		if(class_exists($controller)){
			$controller = new $controller();			
		}else{
			throw $e1 = new \Application\Exceptions\Error404('Запрашиваемая страница не найдена (Отсутствует контроллер: ' . $controller . ')');
		}
		
		if (method_exists($controller, 'action'.$action) && $action){
			$controller->action($action);
			die;
		}else{
			throw $e2 = new \Application\Exceptions\Error404('Запрашиваемая страница не найдена (Отсутствует метод контроллера: action' . $action . ')');
		}		
	} catch (\Application\Exceptions\Error404 $e1){
		$error = $e1->getMessage();
	} catch(\Application\Exceptions\Core $e){
		$error = "Возникло исключение приложения: " . $e->getMessage();
	} catch (\Application\Exceptions\Db $e){
		$error = "Проблемы с БД: " . $e->getMessage();
	} catch (\Application\Exceptions\Error404 $e2){
		$error = $e2->getMessage();
	}finally {
		require 'Application/templates/error.php';
	}
	
}else {
	$controller = new Main();
	$action = 'Index';
}
