<?php
//use Application\Models\User;
use Application\Models\News;

require __DIR__ . '/autoload.php';

$news = News::getLastNews(3);
include __DIR__ . '/Application/Views/news/index.php';
//var_dump($users);