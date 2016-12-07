<?php

use Application\Controllers\News;

require __DIR__ . '/autoload.php';

$controller = new News();
$controller->action('Index');


