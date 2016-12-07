<?php

require __DIR__ . '/autoload.php';

$controller = new Application\Controllers\News();
$action = $_GET['action'] ?: 'Index';

//$controller = new News();
$controller->action($action);


