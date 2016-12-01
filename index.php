<?php
require __DIR__ . '/autoload.php';

$db = new \Application\Db();
$arrRes = $db->query('SELECT * FROM news');
var_dump($arrRes);