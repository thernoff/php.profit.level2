<?php

use Application\Models\News;
use Application\Models\User;
use Application\Config;

require __DIR__ . '/autoload.php';

//$news = News::getLastNews(3);
//include __DIR__ . '/Application/Views/news/index.php';

/*$user = new User();
$user->name = "Света";
$user->email = "sveta@pocta.ru";
$user->insert();
echo $user->id;*/

/*$user1 = new User();
$user1->name = "fgfg";
$user1->email = "dfda@rambler.ru";
$user1->save();*/

//var_dump($user1);

$user = User::findById(7);
//$user->name = "Коля";
//$user->email = "kolya98@mail.com";
var_dump($user);
$user->delete();
//$user->save();

//$config = Config::instance();
//echo $config->data['db']['host'];

//var_dump($config);

//var_dump($users);