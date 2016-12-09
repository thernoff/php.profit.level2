<?php

namespace Application\Controllers;

use Application\View;
use Application\Controller;
use Application\Exceptions\Core;
use Application\Exceptions\Db;

class Main
extends Controller
{
	protected function actionIndex()
	{
		$this->view->title = "Мой сайт";
		echo $this->view->render(__DIR__ . '/../templates/main.php');
	}

	protected function beforeAction()
	{
		
	}
}