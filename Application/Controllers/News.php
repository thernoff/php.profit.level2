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
	
	protected function actionArticle()
	{
		$id = (int)$_GET['id'];		
		$this->view->title = "Мой сайт";		
		$article = \Application\Models\News::findById($id);
		$this->view->article = $article;
		echo $this->view->render(__DIR__ . '/../templates/article.php');
	}
}