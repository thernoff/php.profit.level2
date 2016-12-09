<?php

use Application\Collection;
use Application\Models\News;

require __DIR__ . '/autoload.php';

echo "<h3>Test</h3>";

$news = new News();
var_dump($news);
$news->fill(['title' => "Test1", 'text' => "text text text", 'author' => 'admin']);
var_dump($news);

$a = new Collection();

$a[1] = 1;
$a[11] = 11;
$a[2] = 2354;
foreach ($a as $el){
	echo $el."<br>";
}