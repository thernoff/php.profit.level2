<?php

require __DIR__ . '/autoload.php';
use Application\View;
use Application\Models\User;
use Application\Models\News;

//$users = User::findAll();
$news = News::findAll();

$view = new View;
$view->title = "Мой сайт";
$view->news = $news;
//echo count($view);
//$view->display(__DIR__ . '/Application/templates/index.php');
echo $view->render(__DIR__ . '/Application/templates/index.php');


