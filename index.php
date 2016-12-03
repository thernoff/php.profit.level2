<?php

use Application\Models\News;
use Application\Models\User;

require __DIR__ . '/autoload.php';

//$news = News::getLastNews(3);
//include __DIR__ . '/Application/Views/news/index.php';
$user = new User();
$user->name = "John";
$user->email = "j@mail.com";
$user->insert();
//var_dump($users);