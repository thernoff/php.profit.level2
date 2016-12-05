<?php

require __DIR__ . '/autoload.php';
use Application\View;
use Application\Models\User;

$users = User::findAll();

$view = new View;
$view->users = $users;
//$view->display(__DIR__ . '/Application/templates/index.php');
echo $view->render(__DIR__ . '/Application/templates/index.php');


