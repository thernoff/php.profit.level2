<?php

namespace Application\Controllers;

use Application\View;

class News
{
	protected $view;
	
	public function __construct()
	{
		$this->view = new View();
	}
	
	public function action($action)
	{
		$methodName = 'action' . $action;
		$this->beforeAction();
		return $this->$methodName();
	}
	
	protected function beforeAction()
	{
		//Какие-то действия
	}
	
	protected function actionIndex()
	{
		
		$this->view->title = "Мой сайт";
		$news = \Application\Models\News::findAll();
		$this->view->news = $news;
		echo $this->view->render(__DIR__ . '/../templates/index.php');
	}
}