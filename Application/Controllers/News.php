<?php

namespace Application\Controllers;

use Application\View;
use Application\Controller;

class News
	extends Controller
{
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